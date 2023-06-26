<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function purchases_list()
    {
        $orders_data = array();

        if (auth()->user()->orders->count() > 0) {
            $orders_data = auth()->user()->orders->toQuery()->orderBy("orders.id", "DESC")->get();
        }

        $orders = array();

        for ($i = 0; $i < count($orders_data); $i++) {
            $orders[$i] = array();

            $order_id = $orders_data[$i]->id;
            $order_codes = Code::where("id", $order_id)->get();

            $product_id = $orders_data[$i]->product_id;
            $order_product = Product::find($product_id);

            $orders[$i]["data"] = $orders_data[$i];
            $orders[$i]["codes"] = $order_codes;
            $orders[$i]["product"] = $order_product;
        }

        //dd($orders);

        return view("purchases_list", ["orders" => $orders]);
    }

    public function proccess_purchase(Request $request)
    {
        //dd($request->details);
        $details = $request->details;
        $paid_amount = (float) $details["purchase_units"][0]["amount"]["value"];
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $product = Product::find($product_id);
        $unit_price = $product->price_usd;
        $total_price = $unit_price * $quantity; // right amount to pay

        // creating a new order
        $order = Order::create([
            "quantity" => $quantity,
            "unit_price" => $unit_price,
            "total_price" => $total_price,
            "user_paid" => $paid_amount,
            "payment_issue" => false,
            "email_sent" => false,
            "product_id" => $product_id,
            "user_id" => auth()->user()->id,
        ]);
        $order_id = $order->getKey();

        $status = "";

        if ($details["status"] === "COMPLETED" && $paid_amount === $total_price) {
            // Verifica si la relación "codes" tiene registros antes de ejecutar la consulta
            $available_codes = array();
            if ($product->codes->count() > 0) {
                $available_codes = $product->codes->toQuery()->where("sold", false)->get();
            }

            // verfied if there are enough codes that weren't sold
            if (count($available_codes) >= $quantity) {
                // get n(quantity) codes
                $codes = array();
                for ($i = 0; $i < $quantity; $i++) {
                    $code = $available_codes[$i];
                    $code->sold = true;
                    $code->order_id = $order_id;
                    $code->save(); // Utilizar el método save() para guardar los cambios en la base de datos
                    $codes[] = $code->code;
                }

                // send the email to user with the code(s)
                $user_email = auth()->user()->email;

                Order::where("id", $order_id)
                    ->update(["email_sent" => true]);

                echo "The codes were send successfully throw email :)";
            } else {
                // There aren't enough codes to send :(
                // send me a message to send the codes manually
            }

            $status = "succed";
        } else {
            // Problems with the amount paid (maybe something illegal) :|
            Order::where("id", $order_id)
                ->update(["payment_issue" => true]);

            $status = "failed";
        }

        return response()->json(['status' => $status]);
    }

    public function finish_purchase_succed()
    {
        return view("finished_purchase_succed");
    }

    public function finish_purchase_error()
    {
        // en este caso enviar tambien el order id
        return view("finished_purchase_error");
    }
}
