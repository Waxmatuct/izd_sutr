<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Faculty;
use App\Models\Type;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanController extends Controller
{
    public function index() {
        $books = Book::where('year', '2021')->with('faculty', 'type')->get();

        return view('index', [
            'books' => $books,
        ]);
    }

    public function year($year) {
        $books = Book::where('year', $year)->with('faculty', 'type')->orderBy('month', 'asc')->get();
        $total = $books->sum('size');
        $sdano = $books->whereNotNull('handed_in')->count();
        $proc = $sdano / $books->count() * 100;
        $proc = round($proc, 2);
        $date = Book::where('year', $year)->orderBy('updated_at', 'desc')->first();

        return view('plan', [
            'books' => $books,
            'year' => $year,
            'count'=> $books->count(),
            'total' => $total,
            'sdano' => $sdano,
            'proc' => $proc,
            'date' => $date,

        ]);
    }

    public function faculty($year, $slug) {
        $faculty = Faculty::where('slug',  $slug)->first();
        $books = Book::where(['year' => $year, 'faculty_id' => $faculty->id])
                        ->with('faculty', 'type')
                        ->orderBy('item', 'asc')
                        ->get();
        
        $total = $books->sum('size');
        $sdano = $books->whereNotNull('handed_in')->count();
        $proc = $sdano / $books->count() * 100;
        $proc = round($proc, 2);
        $date = Book::where(['year' => $year, 'faculty_id' => $faculty->id])
                        ->orderBy('updated_at', 'desc')
                        ->first();
        
        $query = Book::where(['year' => $year, 'faculty_id' => $faculty->id])
                        ->orderBy('month')                
                        ->pluck('month');
        
        $months = $query
                        ->collect()
                        ->unique()->values();
                        // ->implode(', ');
        
        $month_count = $query
                        ->countBy()
                        ->collect()
                        // ->sort()
                        ->implode(', ');
                        

        return view('plan-faculty', [
            'books' => $books,
            'year' => $year,
            'count'=> $books->count(),
            'total' => $total,
            'sdano' => $sdano,
            'title' => $faculty->title,
            'proc' => $proc,
            'date' => $date,
            'months' => $months,
            'month_count' => $month_count,

        ]);
    }
}
