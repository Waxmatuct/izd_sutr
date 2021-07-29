<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Faculty;
use App\Models\Type;
use App\Models\Month;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanController extends Controller
{
    public function index() {
        $books = Book::where('year', '2021')->with('faculty', 'type', 'month')->get();

        return view('index', [
            'books' => $books,
        ]);
    }

    public function year($year) {
        $books = Book::where('year', $year)->with('faculty', 'type', 'month')->orderBy('month_id', 'asc')->get();
        $total = $books->sum('size');
        $sdano = $books->whereNotNull('handed_in')->count();
        $proc = $sdano / $books->count() * 100;
        $proc = round($proc, 2);
        $date = Book::where('year', $year)->orderBy('updated_at', 'desc')->first();

        $query1 = Book::where(['year' => $year])->orderBy('month_id')->get('month_id')->pluck('month_id');
        $query2 = Month::whereIn('id', Book::where(['year' => $year])->orderBy('month_id')->groupBy('month_id')->get('month_id')->pluck('month_id'))->pluck('name','id');            

        $months = $query2
                    ->collect()
                    ->unique()->values()
                    ->implode(', ');

        $counts = $query1
                    ->countBy()
                    ->collect()
                    ->implode(', ');

        return view('plan', [
            'books' => $books,
            'year' => $year,
            'count'=> $books->count(),
            'total' => $total,
            'sdano' => $sdano,
            'proc' => $proc,
            'date' => $date,
            'months' => $months,
            'counts' => $counts,

        ]);
    }

    public function faculty($year, $slug) {
        $faculty = Faculty::where('slug',  $slug)->first();
        $books = Book::where(['year' => $year, 'faculty_id' => $faculty->id])
                        ->with('faculty', 'type', 'month')
                        ->orderBy('item', 'asc')
                        ->get();
        
        $total = $books->sum('size');
        $sdano = $books->whereNotNull('handed_in')->count();
        $proc = $sdano / $books->count() * 100;
        $proc = round($proc, 2);
        $date = Book::where(['year' => $year, 'faculty_id' => $faculty->id])
                        ->orderBy('updated_at', 'desc')
                        ->first();
        
        // $query = Book::where(['year' => $year, 'faculty_id' => $faculty->id])
        //                 ->orderBy('month_id')                
        //                 ->pluck('month_id','title');
        
        $query1 = Book::where(['year' => $year, 'faculty_id' => $faculty->id])->orderBy('month_id')->get('month_id')->pluck('month_id');
        $query2 = Month::whereIn('id', Book::where(['year' => $year])->orderBy('month_id')->groupBy('month_id')->get('month_id')->pluck('month_id'))->pluck('name','id');            

        $months = $query2
                    ->collect()
                    ->unique()->values()
                    ->implode(', ');

        $counts = $query1
                    ->countBy()
                    ->collect()
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
            'counts' => $counts,

        ]);
    }
}
