<?php


namespace App\Http\Controllers;


abstract class AbstractController extends Controller
{
    public abstract function getService();
}
