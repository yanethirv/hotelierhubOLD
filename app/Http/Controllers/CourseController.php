<?php

namespace App\Http\Controllers;

use App\Product;

class CourseController extends Controller
{
    public function start(int $id) {
        try {
            $coursesPurchased = auth()->user()->coursesPurchased();
            if (!in_array($id, $coursesPurchased)) {
                return redirect(route('shop'))->with("message", ["danger", __("No tienes acceso para ver este curso")]);
            }
            $course = Product::findOrFail($id);
            dd($course);
        } catch (\Exception $exception) {

        }
    }
}
