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

        // $query1 = Book::where(['year' => $year])->orderBy('month_id')->pluck('month_id'); //массив месяцев
        // $query2 = Month::whereIn('id', $query1)->pluck('name','id'); // получение имен месяцев
        // $query3 = Book::where(['year' => $year])->orderBy('month_id')->groupBy('month_id')->pluck('month_id'); //айдишники месяцев в массиве             

        // \App\Models\Book::where(['year' => '2021'])->whereNotNull('handed_in')->orderBy('month_id')->get('month_id')->pluck('month_id')->countBy()->collect();

        // $months = $query2
        //             ->collect()
        //             ->unique()->values()
        //             ->implode(', '); //объединение уникальных месяцев

        // $counts = $query1
        //             ->countBy()
        //             ->collect()
        //             ->implode(', '); //подсчет кол-ва каждого месяца
        
        //запросы на подсчет запланированных
        $jan = Book::where(['year' => $year, 'month_id' => '1'])->pluck('month_id')->count();
        $feb = Book::where(['year' => $year, 'month_id' => '2'])->pluck('month_id')->count();            
        $mar = Book::where(['year' => $year, 'month_id' => '3'])->pluck('month_id')->count();            
        $apr = Book::where(['year' => $year, 'month_id' => '4'])->pluck('month_id')->count();            
        $may = Book::where(['year' => $year, 'month_id' => '5'])->pluck('month_id')->count();            
        $jun = Book::where(['year' => $year, 'month_id' => '6'])->pluck('month_id')->count();            
        $jul = Book::where(['year' => $year, 'month_id' => '7'])->pluck('month_id')->count();            
        $aug = Book::where(['year' => $year, 'month_id' => '8'])->pluck('month_id')->count();            
        $sep = Book::where(['year' => $year, 'month_id' => '9'])->pluck('month_id')->count();

        $array = array($jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep);
        $counts = implode(', ', $array);
        // dd($counts);
        
        //запросы на подсчет сданных работ
        $jan_h = Book::where(['year' => $year, 'month_id' => '1'])->pluck('is_handed')->sum();
        $feb_h = Book::where(['year' => $year, 'month_id' => '2'])->pluck('is_handed')->sum();            
        $mar_h = Book::where(['year' => $year, 'month_id' => '3'])->pluck('is_handed')->sum();            
        $apr_h = Book::where(['year' => $year, 'month_id' => '4'])->pluck('is_handed')->sum();            
        $may_h = Book::where(['year' => $year, 'month_id' => '5'])->pluck('is_handed')->sum();            
        $jun_h = Book::where(['year' => $year, 'month_id' => '6'])->pluck('is_handed')->sum();            
        $jul_h = Book::where(['year' => $year, 'month_id' => '7'])->pluck('is_handed')->sum();            
        $aug_h = Book::where(['year' => $year, 'month_id' => '8'])->pluck('is_handed')->sum();            
        $sep_h = Book::where(['year' => $year, 'month_id' => '9'])->pluck('is_handed')->sum();
        // $oct = Book::where(['year' => $year, 'month_id' => $query3[9]])->pluck('is_handed')->sum();            

        $array_h = array($jan_h, $feb_h, $mar_h, $apr_h, $may_h, $jun_h, $jul_h, $aug_h, $sep_h);
        $is_handed = implode(', ', $array_h);

        return view('plan', [
            'books' => $books,
            'year' => $year,
            'count'=> $books->count(),
            'total' => $total,
            'sdano' => $sdano,
            'proc' => $proc,
            'date' => $date,
            // 'months' => $months,
            'counts' => $counts,
            'is_handed' => $is_handed,
        ]);
    }

    public function faculty($year, $slug) {
        $faculty = Faculty::where('slug',  $slug)->first();
        $books = Book::where(['year' => $year, 'faculty_id' => $faculty->id])
                        ->with('faculty', 'type', 'month')
                        ->orderBy('month_id')
                        ->get();
        
        $total = $books->sum('size');
        $sdano = $books->whereNotNull('handed_in')->count();
        $proc = $sdano / $books->count() * 100;
        $proc = round($proc, 2);
        $date = Book::where(['year' => $year, 'faculty_id' => $faculty->id])
                        ->orderBy('updated_at', 'desc')
                        ->first();
        
        //запросы на подсчет запланированных
        $jan = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '1'])->pluck('month_id')->count();
        $feb = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '2'])->pluck('month_id')->count();            
        $mar = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '3'])->pluck('month_id')->count();            
        $apr = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '4'])->pluck('month_id')->count();            
        $may = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '5'])->pluck('month_id')->count();            
        $jun = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '6'])->pluck('month_id')->count();            
        $jul = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '7'])->pluck('month_id')->count();            
        $aug = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '8'])->pluck('month_id')->count();            
        $sep = Book::where(['year' => $year, 'faculty_id' => $faculty->id,'month_id' => '9'])->pluck('month_id')->count();

        $array = array($jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep);
        $counts = implode(', ', $array);
        // dd($counts);
        
        //запросы на подсчет сданных работ
        $jan_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '1'])->pluck('is_handed')->sum();
        $feb_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '2'])->pluck('is_handed')->sum();            
        $mar_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '3'])->pluck('is_handed')->sum();            
        $apr_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '4'])->pluck('is_handed')->sum();            
        $may_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '5'])->pluck('is_handed')->sum();            
        $jun_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '6'])->pluck('is_handed')->sum();            
        $jul_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '7'])->pluck('is_handed')->sum();            
        $aug_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '8'])->pluck('is_handed')->sum();            
        $sep_h = Book::where(['year' => $year, 'faculty_id' => $faculty->id, 'month_id' => '9'])->pluck('is_handed')->sum();
        // $oct = Book::where(['year' => $year, 'month_id' => $query3[9]])->pluck('is_handed')->sum();            

        $array_h = array($jan_h, $feb_h, $mar_h, $apr_h, $may_h, $jun_h, $jul_h, $aug_h, $sep_h);
        $is_handed = implode(', ', $array_h);
                        

        return view('plan-faculty', [
            'books' => $books,
            'year' => $year,
            'count'=> $books->count(),
            'total' => $total,
            'sdano' => $sdano,
            'title' => $faculty->title,
            'proc' => $proc,
            'date' => $date,
            'counts' => $counts,
            'is_handed' => $is_handed,

        ]);
    }
}
