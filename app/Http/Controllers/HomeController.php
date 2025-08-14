<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prompts = [
            [
                'title' => 'خانه قدیمی در جنگل',
                'image' => 'https://picsum.photos/id/168/600/400', // Forest house
                'description' => 'خانه‌ای قدیمی در میان جنگلی انبوه که سال‌هاست متروک مانده است. چه رازهایی در پشت دیوارهای آن پنهان شده است؟',
                'questions' => [
                    'چه کسی در این خانه زندگی می‌کرد؟',
                    'چرا این خانه رها شده است؟',
                    'اگر یک روز را در این خانه بگذرانید، چه اتفاقی می‌افتد؟'
                ]
            ],
            [
                'title' => 'سفر دریایی مرموز',
                'image' => 'https://picsum.photos/id/211/600/400', // Ship
                'description' => 'کشتی بادبانی که در مه صبحگاهی گم شده است. مقصد این سفر کجاست و چه کسانی در آن سفر می‌کنند؟',
                'questions' => [
                    'هدف این سفر چیست؟',
                    'چرا کشتی در مه گم شده است؟',
                    'اگر شما یکی از مسافران این کشتی بودید، چه می‌کردید؟'
                ]
            ],
            [
                'title' => 'شهر زیرزمینی',
                'image' => 'https://picsum.photos/id/1062/600/400', // Tunnel
                'description' => 'شهری مخفی در اعماق زمین که ساکنان آن سال‌هاست از دنیای بیرون جدا زندگی می‌کنند.',
                'questions' => [
                    'چرا این شهر ساخته شده است؟',
                    'قوانین زندگی در این شهر چیست؟',
                    'اگر یک غریبه وارد این شهر شود، چه اتفاقی می‌افتد؟'
                ]
            ],
            [
                'title' => 'ساعت جادویی',
                'image' => 'https://picsum.photos/id/175/600/400', // Clock
                'description' => 'ساعتی قدیمی که می‌تواند زمان را متوقف کند یا به گذشته سفر دهد. اما هر استفاده از آن قیمتی دارد.',
                'questions' => [
                    'این ساعت از کجا آمده است؟',
                    'قیمت استفاده از این ساعت چیست؟',
                    'اگر شما این ساعت را داشتید، چه می‌کردید؟'
                ]
            ]
        ];

        return view('home', ['prompts' => $prompts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
