<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        // Data dummy untuk berita dengan URL gambar dan tanggal
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=1', 'image_caption' => 'image caption 1', 'date' => '2024-07-20', 'region' => 'Jakarta'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=2', 'image_caption' => 'image caption 2', 'date' => '2024-07-19', 'region' => 'Jawa Timur'],
            ['id' => 3, 'title' => 'kesehatan Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=3', 'image_caption' => 'image caption 3', 'date' => '2024-07-18', 'region' => 'Jawa Barat'],
            ['id' => 4, 'title' => 'hiburan Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=4', 'image_caption' => 'image caption 4', 'date' => '2024-07-17', 'region' => 'Jawa Tengah'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=5', 'image_caption' => 'image caption 5', 'date' => '2024-07-16', 'region' => 'Jakarta'],
            ['id' => 6, 'title' => 'kesehatan Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=6', 'image_caption' => 'image caption 6', 'date' => '2024-07-15', 'region' => 'Jawa Timur'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=7', 'image_caption' => 'image caption 7', 'date' => '2024-07-14', 'region' => 'Jawa Barat'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=8', 'image_caption' => 'image caption 8', 'date' => '2024-07-13', 'region' => 'Jawa Tengah'],
            ['id' => 9, 'title' => 'kesehatan Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=9', 'image_caption' => 'image caption 9', 'date' => '2024-07-12', 'region' => 'Jakarta'],
            ['id' => 10, 'title' => 'hiburan Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=10', 'image_caption' => 'image caption 10', 'date' => '2024-07-11', 'region' => 'Jawa Timur'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=11', 'image_caption' => 'image caption 11', 'date' => '2024-07-10', 'region' => 'Jawa Barat'],
            ['id' => 12, 'title' => 'kesehatan Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=12', 'image_caption' => 'image caption 12', 'date' => '2024-07-09', 'region' => 'Jawa Tengah'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=13', 'image_caption' => 'image caption 13', 'date' => '2024-07-08', 'region' => 'Jakarta'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=14', 'image_caption' => 'image caption 14', 'date' => '2024-07-07', 'region' => 'Jawa Timur'],
            ['id' => 15, 'title' => 'kesehatan Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=15', 'image_caption' => 'image caption 15', 'date' => '2024-07-06', 'region' => 'Jawa Barat'],
            ['id' => 16, 'title' => 'hiburan Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=16', 'image_caption' => 'image caption 16', 'date' => '2024-07-05', 'region' => 'Jawa Tengah'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=17', 'image_caption' => 'image caption 17', 'date' => '2024-07-04', 'region' => 'Jakarta'],
            ['id' => 18, 'title' => 'kesehatan Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=18', 'image_caption' => 'image caption 18', 'date' => '2024-07-03', 'region' => 'Jawa Timur'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=19', 'image_caption' => 'image caption 19', 'date' => '2024-07-02', 'region' => 'Jawa Barat'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=20', 'image_caption' => 'image caption 20', 'date' => '2024-07-01', 'region' => 'Jawa Tengah'],
            ['id' => 21, 'title' => 'kesehatan Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=21', 'image_caption' => 'image caption 21', 'date' => '2024-06-30', 'region' => 'Jakarta'],
            ['id' => 22, 'title' => 'hiburan Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=22', 'image_caption' => 'image caption 22', 'date' => '2024-06-29', 'region' => 'Jawa Timur'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=23', 'image_caption' => 'image caption 23', 'date' => '2024-06-28', 'region' => 'Jawa Barat'],
            ['id' => 24, 'title' => 'kesehatan Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=24', 'image_caption' => 'image caption 24', 'date' => '2024-06-27', 'region' => 'Jawa Tengah'],
            ['id' => 25, 'title' => 'kesehatan Alert: Example Title 25', 'body' => 'This is a short description of the news article number 25.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=25', 'image_caption' => 'image caption 25', 'date' => '2024-06-28', 'region' => 'Jawa Tengah'],
            ['id' => 26, 'title' => 'kesehatan Alert: Example Title 26', 'body' => 'This is a short description of the news article number 26.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=26', 'image_caption' => 'image caption 26', 'date' => '2024-06-29', 'region' => 'Jawa Tengah'],
            ['id' => 27, 'title' => 'kesehatan Alert: Example Title 27', 'body' => 'This is a short description of the news article number 27.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=27', 'image_caption' => 'image caption 27', 'date' => '2024-06-30', 'region' => 'Jawa Tengah'],
        ]);        

        // Data dummy untuk kategori editor choice, komunitas, dan opini
        $editorChoiceMain = ['id' => 1, 'title' => 'Feature Main Title', 'category' => 'Feature', 'image_url' => 'https://picsum.photos/800/500?random=28', 'date' => '2024-07-20'];
        $editorChoiceNews = collect([
            ['id' => 2, 'title' => 'Feature Title 2', 'category' => 'Feature', 'image_url' => 'https://picsum.photos/800/500?random=29', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Feature Title 3', 'category' => 'Feature', 'image_url' => 'https://picsum.photos/800/500?random=30', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Feature Title 4', 'category' => 'Feature', 'image_url' => 'https://picsum.photos/800/500?random=31', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Feature Title 5', 'category' => 'Feature', 'image_url' => 'https://picsum.photos/800/500?random=32', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Feature Title 6', 'category' => 'Feature', 'image_url' => 'https://picsum.photos/800/500?random=33', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Feature Title 7', 'category' => 'Feature', 'image_url' => 'https://picsum.photos/800/500?random=34', 'date' => '2024-07-18'],
        ]);

        $komunitasMain = ['id' => 1, 'title' => 'Komunitas Main Title', 'category' => 'Komunitas', 'image_url' => 'https://picsum.photos/800/500?random=35', 'date' => '2024-07-20'];
        $komunitasNews = collect([
            ['id' => 2, 'title' => 'Komunitas Title 2', 'category' => 'Komunitas', 'image_url' => 'https://picsum.photos/800/500?random=36', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Komunitas Title 3', 'category' => 'Komunitas', 'image_url' => 'https://picsum.photos/800/500?random=37', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Komunitas Title 4', 'category' => 'Komunitas', 'image_url' => 'https://picsum.photos/800/500?random=38', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Komunitas Title 5', 'category' => 'Komunitas', 'image_url' => 'https://picsum.photos/800/500?random=39', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Komunitas Title 6', 'category' => 'Komunitas', 'image_url' => 'https://picsum.photos/800/500?random=40', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Komunitas Title 7', 'category' => 'Komunitas', 'image_url' => 'https://picsum.photos/800/500?random=41', 'date' => '2024-07-18'],
        ]);

        $opiniMain = ['id' => 1, 'title' => 'Opini Main Title', 'category' => 'Opini', 'image_url' => 'https://picsum.photos/800/500?random=42', 'date' => '2024-07-20'];
        $opiniNews = collect([
            ['id' => 2, 'title' => 'Opini Title 2', 'category' => 'Opini', 'image_url' => 'https://picsum.photos/800/500?random=42', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Opini Title 3', 'category' => 'Opini', 'image_url' => 'https://picsum.photos/800/500?random=43', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Opini Title 4', 'category' => 'Opini', 'image_url' => 'https://picsum.photos/800/500?random=44', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Opini Title 5', 'category' => 'Opini', 'image_url' => 'https://picsum.photos/800/500?random=45', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Opini Title 6', 'category' => 'Opini', 'image_url' => 'https://picsum.photos/800/500?random=46', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Opini Title 7', 'category' => 'Opini', 'image_url' => 'https://picsum.photos/800/500?random=47', 'date' => '2024-07-18'],
        ]);

        // Paginate the news collection
        $perPage = 6; // Number of items per page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $news->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $popularNews = [
            ['title' => 'Popular News with title 1', 'image_url' => 'https://picsum.photos/800/500?random=48', 'date' => '2024-07-18'],
            ['title' => 'Popular News with title 2', 'image_url' => 'https://picsum.photos/800/500?random=49', 'date' => '2024-07-17'],
            ['title' => 'Popular News with title 3', 'image_url' => 'https://picsum.photos/800/500?random=50', 'date' => '2024-07-16'],
            ['title' => 'Popular News with title 4', 'image_url' => 'https://picsum.photos/800/500?random=51', 'date' => '2024-07-15'],
            ['title' => 'Popular News with title 5', 'image_url' => 'https://picsum.photos/800/500?random=52', 'date' => '2024-07-14'],
        ];

        // Data dummy untuk kategori
        $categories = ['Politik', 'kesehatan', 'Teknologi', 'Hiburan', 'Olahraga'];

        // Data dummy untuk regions
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];

        return view('user.home', compact('news', 'paginatedNews', 'popularNews', 'categories', 'regions', 'editorChoiceMain', 'editorChoiceNews', 'komunitasMain', 'komunitasNews', 'opiniMain', 'opiniNews'));
    }

    public function category($category)
    {
        // Data dummy untuk berita dengan URL gambar dan tanggal
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=53', 'image_caption' => 'image caption 1', 'date' => '2024-07-20', 'region' => 'Jakarta'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=54', 'image_caption' => 'image caption 2', 'date' => '2024-07-19', 'region' => 'Jawa Timur'],
            ['id' => 3, 'title' => 'kesehatan Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=55', 'image_caption' => 'image caption 3', 'date' => '2024-07-18', 'region' => 'Jawa Barat'],
            ['id' => 4, 'title' => 'hiburan Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=56', 'image_caption' => 'image caption 4', 'date' => '2024-07-17', 'region' => 'Jawa Tengah'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=57', 'image_caption' => 'image caption 5', 'date' => '2024-07-16', 'region' => 'Jakarta'],
            ['id' => 6, 'title' => 'kesehatan Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=58', 'image_caption' => 'image caption 6', 'date' => '2024-07-15', 'region' => 'Jawa Timur'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=59', 'image_caption' => 'image caption 7', 'date' => '2024-07-14', 'region' => 'Jawa Barat'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=60', 'image_caption' => 'image caption 8', 'date' => '2024-07-13', 'region' => 'Jawa Tengah'],
            ['id' => 9, 'title' => 'kesehatan Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=61', 'image_caption' => 'image caption 9', 'date' => '2024-07-12', 'region' => 'Jakarta'],
            ['id' => 10, 'title' => 'hiburan Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=62', 'image_caption' => 'image caption 10', 'date' => '2024-07-11', 'region' => 'Jawa Timur'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=63', 'image_caption' => 'image caption 11', 'date' => '2024-07-10', 'region' => 'Jawa Barat'],
            ['id' => 12, 'title' => 'kesehatan Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=64', 'image_caption' => 'image caption 12', 'date' => '2024-07-09', 'region' => 'Jawa Tengah'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=65', 'image_caption' => 'image caption 13', 'date' => '2024-07-08', 'region' => 'Jakarta'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=66', 'image_caption' => 'image caption 14', 'date' => '2024-07-07', 'region' => 'Jawa Timur'],
            ['id' => 15, 'title' => 'kesehatan Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=67', 'image_caption' => 'image caption 15', 'date' => '2024-07-06', 'region' => 'Jawa Barat'],
            ['id' => 16, 'title' => 'hiburan Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=68', 'image_caption' => 'image caption 16', 'date' => '2024-07-05', 'region' => 'Jawa Tengah'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=69', 'image_caption' => 'image caption 17', 'date' => '2024-07-04', 'region' => 'Jakarta'],
            ['id' => 18, 'title' => 'kesehatan Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=70', 'image_caption' => 'image caption 18', 'date' => '2024-07-03', 'region' => 'Jawa Timur'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=71', 'image_caption' => 'image caption 19', 'date' => '2024-07-02', 'region' => 'Jawa Barat'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=72', 'image_caption' => 'image caption 20', 'date' => '2024-07-01', 'region' => 'Jawa Tengah'],
            ['id' => 21, 'title' => 'kesehatan Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=73', 'image_caption' => 'image caption 21', 'date' => '2024-06-30', 'region' => 'Jakarta'],
            ['id' => 22, 'title' => 'hiburan Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=74', 'image_caption' => 'image caption 22', 'date' => '2024-06-29', 'region' => 'Jawa Timur'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=75', 'image_caption' => 'image caption 23', 'date' => '2024-06-28', 'region' => 'Jawa Barat'],
            ['id' => 24, 'title' => 'kesehatan Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=76', 'image_caption' => 'image caption 24', 'date' => '2024-06-27', 'region' => 'Jawa Tengah'],
            ['id' => 25, 'title' => 'kesehatan Alert: Example Title 25', 'body' => 'This is a short description of the news article number 25.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=77', 'image_caption' => 'image caption 25', 'date' => '2024-06-28', 'region' => 'Jawa Tengah'],
            ['id' => 26, 'title' => 'kesehatan Alert: Example Title 26', 'body' => 'This is a short description of the news article number 26.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=78', 'image_caption' => 'image caption 26', 'date' => '2024-06-29', 'region' => 'Jawa Tengah'],
            ['id' => 27, 'title' => 'kesehatan Alert: Example Title 27', 'body' => 'This is a short description of the news article number 27.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=79', 'image_caption' => 'image caption 27', 'date' => '2024-06-30', 'region' => 'Jawa Tengah'],
        ]);        
    
        // Filter berita berdasarkan kategori
        $filteredNews = $news->filter(function ($newsItem) use ($category) {
            return strtolower($newsItem['category']) === strtolower($category);
        });

       // Paginate the filtered news collection
       $perPage = 6; // Number of items per page
       $currentPage = LengthAwarePaginator::resolveCurrentPage();
       $currentItems = $filteredNews->slice(($currentPage - 1) * $perPage, $perPage)->all();
       $paginatedNews = new LengthAwarePaginator($currentItems, $filteredNews->count(), $perPage, $currentPage, [
           'path' => LengthAwarePaginator::resolveCurrentPath()
       ]);
   
       $popularNews = [
            ['title' => 'Popular News with title 1', 'image_url' => 'https://picsum.photos/800/500?random=80', 'date' => '2024-07-18'],
            ['title' => 'Popular News with title 2', 'image_url' => 'https://picsum.photos/800/500?random=81', 'date' => '2024-07-17'],
            ['title' => 'Popular News with title 3', 'image_url' => 'https://picsum.photos/800/500?random=82', 'date' => '2024-07-16'],
            ['title' => 'Popular News with title 4', 'image_url' => 'https://picsum.photos/800/500?random=83', 'date' => '2024-07-15'],
            ['title' => 'Popular News with title 5', 'image_url' => 'https://picsum.photos/800/500?random=84', 'date' => '2024-07-14'],
        ];

        // Data dummy untuk kategori
        $categories = ['Politik', 'kesehatan', 'Teknologi', 'Hiburan', 'Olahraga'];

        // Data dummy untuk regions
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];
   
       return view('user.category', compact('category', 'paginatedNews', 'popularNews', 'categories', 'regions'));
   
    }

    public function region($region)
    {
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=85', 'image_caption' => 'image caption 1', 'date' => '2024-07-20', 'region' => 'Jakarta'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=86', 'image_caption' => 'image caption 2', 'date' => '2024-07-19', 'region' => 'Jawa Timur'],
            ['id' => 3, 'title' => 'kesehatan Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=87', 'image_caption' => 'image caption 3', 'date' => '2024-07-18', 'region' => 'Jawa Barat'],
            ['id' => 4, 'title' => 'hiburan Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=88', 'image_caption' => 'image caption 4', 'date' => '2024-07-17', 'region' => 'Jawa Tengah'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=89', 'image_caption' => 'image caption 5', 'date' => '2024-07-16', 'region' => 'Jakarta'],
            ['id' => 6, 'title' => 'kesehatan Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=90', 'image_caption' => 'image caption 6', 'date' => '2024-07-15', 'region' => 'Jawa Timur'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=91', 'image_caption' => 'image caption 7', 'date' => '2024-07-14', 'region' => 'Jawa Barat'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=92', 'image_caption' => 'image caption 8', 'date' => '2024-07-13', 'region' => 'Jawa Tengah'],
            ['id' => 9, 'title' => 'kesehatan Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=93', 'image_caption' => 'image caption 9', 'date' => '2024-07-12', 'region' => 'Jakarta'],
            ['id' => 10, 'title' => 'hiburan Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=94', 'image_caption' => 'image caption 10', 'date' => '2024-07-11', 'region' => 'Jawa Timur'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=95', 'image_caption' => 'image caption 11', 'date' => '2024-07-10', 'region' => 'Jawa Barat'],
            ['id' => 12, 'title' => 'kesehatan Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=96', 'image_caption' => 'image caption 12', 'date' => '2024-07-09', 'region' => 'Jawa Tengah'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=97', 'image_caption' => 'image caption 13', 'date' => '2024-07-08', 'region' => 'Jakarta'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=98', 'image_caption' => 'image caption 14', 'date' => '2024-07-07', 'region' => 'Jawa Timur'],
            ['id' => 15, 'title' => 'kesehatan Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=99', 'image_caption' => 'image caption 15', 'date' => '2024-07-06', 'region' => 'Jawa Barat'],
            ['id' => 16, 'title' => 'hiburan Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=100', 'image_caption' => 'image caption 16', 'date' => '2024-07-05', 'region' => 'Jawa Tengah'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=101', 'image_caption' => 'image caption 17', 'date' => '2024-07-04', 'region' => 'Jakarta'],
            ['id' => 18, 'title' => 'kesehatan Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=102', 'image_caption' => 'image caption 18', 'date' => '2024-07-03', 'region' => 'Jawa Timur'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=103', 'image_caption' => 'image caption 19', 'date' => '2024-07-02', 'region' => 'Jawa Barat'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=104', 'image_caption' => 'image caption 20', 'date' => '2024-07-01', 'region' => 'Jawa Tengah'],
            ['id' => 21, 'title' => 'kesehatan Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=105', 'image_caption' => 'image caption 21', 'date' => '2024-06-30', 'region' => 'Jakarta'],
            ['id' => 22, 'title' => 'hiburan Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=106', 'image_caption' => 'image caption 22', 'date' => '2024-06-29', 'region' => 'Jawa Timur'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=107', 'image_caption' => 'image caption 23', 'date' => '2024-06-28', 'region' => 'Jawa Barat'],
            ['id' => 24, 'title' => 'kesehatan Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=108', 'image_caption' => 'image caption 24', 'date' => '2024-06-27', 'region' => 'Jawa Tengah'],
            ['id' => 25, 'title' => 'kesehatan Alert: Example Title 25', 'body' => 'This is a short description of the news article number 25.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=109', 'image_caption' => 'image caption 25', 'date' => '2024-06-28', 'region' => 'Jawa Tengah'],
            ['id' => 26, 'title' => 'kesehatan Alert: Example Title 26', 'body' => 'This is a short description of the news article number 26.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=110', 'image_caption' => 'image caption 26', 'date' => '2024-06-29', 'region' => 'Jawa Tengah'],
            ['id' => 27, 'title' => 'kesehatan Alert: Example Title 27', 'body' => 'This is a short description of the news article number 27.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=111', 'image_caption' => 'image caption 27', 'date' => '2024-06-30', 'region' => 'Jawa Tengah'],
        ]);
        
    
        // Filter news by region
        $filteredNews = $news->filter(function ($newsItem) use ($region) {
            return strtolower($newsItem['region']) === strtolower($region);
        });

        // Paginate the filtered news collection
        $perPage = 6; // Number of items per page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $filteredNews->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $filteredNews->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

       $popularNews = [
            ['title' => 'Popular News with title 1', 'image_url' => 'https://picsum.photos/800/500?random=112', 'date' => '2024-07-18'],
            ['title' => 'Popular News with title 2', 'image_url' => 'https://picsum.photos/800/500?random=113', 'date' => '2024-07-17'],
            ['title' => 'Popular News with title 3', 'image_url' => 'https://picsum.photos/800/500?random=114', 'date' => '2024-07-16'],
            ['title' => 'Popular News with title 4', 'image_url' => 'https://picsum.photos/800/500?random=115', 'date' => '2024-07-15'],
            ['title' => 'Popular News with title 5', 'image_url' => 'https://picsum.photos/800/500?random=116', 'date' => '2024-07-14'],
        ];

        // Data dummy untuk kategori dan regions
        $categories = ['Politik', 'kesehatan', 'Teknologi', 'Hiburan', 'Olahraga'];
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];

        return view('user.region', compact('region', 'paginatedNews', 'popularNews', 'categories', 'regions'));
   
    }

    public function detail($id)
    {
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=117', 'image_caption' => 'image caption 1', 'date' => '2024-07-20', 'region' => 'Jakarta'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=118', 'image_caption' => 'image caption 2', 'date' => '2024-07-19', 'region' => 'Jawa Timur'],
            ['id' => 3, 'title' => 'kesehatan Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=119', 'image_caption' => 'image caption 3', 'date' => '2024-07-18', 'region' => 'Jawa Barat'],
            ['id' => 4, 'title' => 'hiburan Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=120', 'image_caption' => 'image caption 4', 'date' => '2024-07-17', 'region' => 'Jawa Tengah'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=121', 'image_caption' => 'image caption 5', 'date' => '2024-07-16', 'region' => 'Jakarta'],
            ['id' => 6, 'title' => 'kesehatan Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=122', 'image_caption' => 'image caption 6', 'date' => '2024-07-15', 'region' => 'Jawa Timur'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=123', 'image_caption' => 'image caption 7', 'date' => '2024-07-14', 'region' => 'Jawa Barat'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=124', 'image_caption' => 'image caption 8', 'date' => '2024-07-13', 'region' => 'Jawa Tengah'],
            ['id' => 9, 'title' => 'kesehatan Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=125', 'image_caption' => 'image caption 9', 'date' => '2024-07-12', 'region' => 'Jakarta'],
            ['id' => 10, 'title' => 'hiburan Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=126', 'image_caption' => 'image caption 10', 'date' => '2024-07-11', 'region' => 'Jawa Timur'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=127', 'image_caption' => 'image caption 11', 'date' => '2024-07-10', 'region' => 'Jawa Barat'],
            ['id' => 12, 'title' => 'kesehatan Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=128', 'image_caption' => 'image caption 12', 'date' => '2024-07-09', 'region' => 'Jawa Tengah'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=129', 'image_caption' => 'image caption 13', 'date' => '2024-07-08', 'region' => 'Jakarta'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=130', 'image_caption' => 'image caption 14', 'date' => '2024-07-07', 'region' => 'Jawa Timur'],
            ['id' => 15, 'title' => 'kesehatan Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=131', 'image_caption' => 'image caption 15', 'date' => '2024-07-06', 'region' => 'Jawa Barat'],
            ['id' => 16, 'title' => 'hiburan Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=132', 'image_caption' => 'image caption 16', 'date' => '2024-07-05', 'region' => 'Jawa Tengah'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=133', 'image_caption' => 'image caption 17', 'date' => '2024-07-04', 'region' => 'Jakarta'],
            ['id' => 18, 'title' => 'kesehatan Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=134', 'image_caption' => 'image caption 18', 'date' => '2024-07-03', 'region' => 'Jawa Timur'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=135', 'image_caption' => 'image caption 19', 'date' => '2024-07-02', 'region' => 'Jawa Barat'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'teknologi', 'image_url' => 'https://picsum.photos/800/500?random=136', 'image_caption' => 'image caption 20', 'date' => '2024-07-01', 'region' => 'Jawa Tengah'],
            ['id' => 21, 'title' => 'kesehatan Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=137', 'image_caption' => 'image caption 21', 'date' => '2024-06-30', 'region' => 'Jakarta'],
            ['id' => 22, 'title' => 'hiburan Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'hiburan', 'image_url' => 'https://picsum.photos/800/500?random=138', 'image_caption' => 'image caption 22', 'date' => '2024-06-29', 'region' => 'Jawa Timur'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'politik', 'image_url' => 'https://picsum.photos/800/500?random=139', 'image_caption' => 'image caption 23', 'date' => '2024-06-28', 'region' => 'Jawa Barat'],
            ['id' => 24, 'title' => 'kesehatan Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'kesehatan', 'image_url' => 'https://picsum.photos/800/500?random=140', 'image_caption' => 'image caption 24', 'date' => '2024-06-27', 'region' => 'Jawa Tengah'],
            ['id' => 25, 'title' => 'kesehatan Alert: Example Title 25', 'body' => 'This is a short description of the news article number 25.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=141', 'image_caption' => 'image caption 25', 'date' => '2024-06-28', 'region' => 'Jawa Tengah'],
            ['id' => 26, 'title' => 'kesehatan Alert: Example Title 26', 'body' => 'This is a short description of the news article number 26.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=142', 'image_caption' => 'image caption 26', 'date' => '2024-06-29', 'region' => 'Jawa Tengah'],
            ['id' => 27, 'title' => 'kesehatan Alert: Example Title 27', 'body' => 'This is a short description of the news article number 27.', 'category' => 'olahraga', 'image_url' => 'https://picsum.photos/800/500?random=143', 'image_caption' => 'image caption 27', 'date' => '2024-06-30', 'region' => 'Jawa Tengah'],
        ]);
        
    
    // Cari berita berdasarkan ID
    $newsItem = $news->firstWhere('id', $id);

    // Jika berita tidak ditemukan, kembali ke halaman sebelumnya dengan pesan error
    if (!$newsItem) {
        return redirect()->back()->with('error', 'News not found');
    }

    $popularNews = [
        ['title' => 'Popular News with title 1', 'image_url' => 'https://picsum.photos/800/500?random=144', 'date' => '2024-07-18'],
        ['title' => 'Popular News with title 2', 'image_url' => 'https://picsum.photos/800/500?random=145', 'date' => '2024-07-17'],
        ['title' => 'Popular News with title 3', 'image_url' => 'https://picsum.photos/800/500?random=146', 'date' => '2024-07-16'],
        ['title' => 'Popular News with title 4', 'image_url' => 'https://picsum.photos/800/500?random=147', 'date' => '2024-07-15'],
        ['title' => 'Popular News with title 5', 'image_url' => 'https://picsum.photos/800/500?random=148', 'date' => '2024-07-14'],
    ];

    $categories = ['Politik', 'kesehatan', 'Teknologi', 'Hiburan', 'Olahraga'];
    $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];
    $relatedNews = $news->where('id', '!=', $id)->take(3);

    return view('user.detail', compact('newsItem', 'popularNews', 'categories', 'regions', 'relatedNews'));
    }
    
}

