<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        //echo "Selamat Datang di Website Kami";
        return 'Kontak Kami <br>
        <ul>
            <li>Nomor telepon : 08124835295</li>
            <li>E-mail : edu-web@gmail.com</li>
        </ul>
        <label>Contact</label>
        <br>
        <input placeholder="Masukkan contact">
        <button>Submit</button>
        ';
    }
    // public function product(){
    //     echo "Halaman products <br>";
    //     echo "
    //         <ul>
    //             <li>
    //                 <a href='https://www.educastudio.com/category/marbel-edu-games'>Edu Games</a>
    //             </li>
    //             <li>
    //                 <a href='https://www.educastudio.com/category/marbel-and-friends-kids-games'>Kids Games</a>
    //             </li>
    //             <li>
    //                 <a href='https://www.educastudio.com/category/riri-story-books'>Story Books</a>
    //             </li>
    //             <li>
    //                 <a href='https://www.educastudio.com/category/kolak-kids-songs'>Kids Song</a>
    //             </li>
    //         </ul>";
    // }
    // public function news($param){
    //     echo "Halaman News";
    //     echo "<br>";
    //     echo"
    //     <ul>
    //         <li>
    //             <a href='https://www.educastudio.com/news'>News : 1</a>
    //         </li>
    //         <li>
    //             <a href='https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitar-terdampak-covid-19'>News : 2</a>
    //         </li>
    //     </ul>";
    // }
    // public function program(){
    //     echo "Halaman Program <br>";
    //     echo "
    //         <ul>
    //             <li>
    //             <a href='https://www.educastudio.com/program/karir'>Program Karir</a>
    //             </li>
    //             <li>
    //                 <a href='https://www.educastudio.com/program/magang'>Program Magang</a>
    //             </li>
    //             <li>
    //                 <a href='https://www.educastudio.com/program/kunjungan-industri'>Program Kunjungan Industri</a>
    //             </li>
    //         </ul>
    //     ";
    // }


}


