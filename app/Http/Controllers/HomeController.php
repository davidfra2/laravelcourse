<?php
 
namespace App\Http\Controllers;

use Illuminate\View\View;
 
class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }
    
    public function about(): View
    {
    $data1 = "About us - Online Store";
    $data2 = "About us";
    $description = "This is an about page ...";
    $author = "Developed by: Your Name";

    return view('home.about')->with("title", $data1)
        ->with("subtitle", $data2)
        ->with("description", $description)
        ->with("author", $author);
    }
  public function contact(): View
    {
    $viewData = [];
    $viewData["title"] = "Contact - Online Store";
    $viewData["subtitle"] = "Contact us";
    $viewData["name"] = "David Rios";
    $viewData["address"] = "Medellín, Colombia";
    $viewData["phone"] = "300 123 4567";

    return view('home.contact')->with("viewData", $viewData);
    }

    
}


