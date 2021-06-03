<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePagesController extends Controller
{
    public function getHomePage() {
        
        return view("single__pages.home", ["title" => "Home | Plankcooking.com"]);
    }

    public function getAboutPage() {
        return view("single__pages.about", ["title" => "About | Plankcooking.com"]);
    }

    public function getContactPage() {
        return view("single__pages.contact", ["title" => "Contact Us | Plankcooking.com"]);
    }

    public function getRecipesPage() {
        return view("single__pages.recipes", ["title" => "Recipes | Plankcooking.com"]);
    }

    public function getReviewsPage() {
        return view("single__pages.reviews", ["title" => "Reviews | Plankcooking.com"]);
    }

    public function getTestimonialsPage() {
        return view("single__pages.testimonials", ["title" => "Testimonials | Plankcooking.com"]);
    }
}
