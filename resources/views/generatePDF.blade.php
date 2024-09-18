<!DOCTYPE html>
<html>
<head>
    <title>Murojaatlar List</title>
    <style>
        .row {
            width: 100%;
            margin-top: 30px;
            margin-bottom: 50px;
        }
        .col-4 {
            width: 33%;
            float: left;
            text-align: center;
        }
        .col-6 {
            width: 47%;
            float: left;
        }
        .col-4-mygo {
            padding: 30px 0px 0px;
        }
        .col-4-gerb {
            padding-top: 15px;
        }
        .gerb_img {
            width: 150px;
            height: 100px;
        }
        .mygo_img {
            width: 200px;
            height: 50px;
        }
        .clear {
            clear: both;
        }
        .clock {
            text-align: right;
        }
        hr {
            height: 3px;
            color: black;
            background: black;
        }
        *{
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="clock" id="clock"> {{$books ->created_at}}</div>
    <hr>
    <div class="container" style="   margin-bottom:30px;" >
        <div class="row">
            <div class="col-4 col-4-mygo">
                <img src="images/mygo.png" class="mygo_img" alt="rasm yuq">
            </div>
            <div class="col-4 col-4-gerb">
                <img src="images/gerb.png" class="gerb_img" alt="rasm yuq">
            </div>
            <div class="col-4">
                <h3 style="margin-top: 25px">O'zbekiston Respublikasi Oliy ta'lim fan va innovatsiyalar vazirligi</h3>
            </div>
        </div>
        <div class="clear"></div>
        <div class="row">
            <div class="col-6">
                <h6 style="text-align: left">No: 5271-8166-daeb-a914-a9f0-5709-8475 <br>
                    Hujjat yaratilgan sana: 2024-09-06 <br>
                    Ariza raqami: 146403968</h6>
            </div>
            <div class="col-6">
                <h6 style="text-align: right">Hujjat berilgan: ESHQUVATOV SAHOBIDDIN SALOHIDDIN O'G'LI <br>
                    JShShIR: 50102075450050</h6>
            </div>
            <div class="clear"></div>
        </div>
        <h2 style="text-align: center; margin-bottom:30px">Kutubxoanda ro`yxatidagi ma'lumotlari</h2>
        <table border="2" width="100%" cellpadding="10" cellspacing="0" style="margin-bottom: 20px">
            <tr>
                <th align="left">ID</th>
                <td>{{ $books->id }}</td>
            <tr>
                <th align="left">Name</th>
                <td>{{ $books->name }}</td>
            </tr>
            <tr>
                <th align="left">Manzil</th>
                <td>{{ $books->email }}</td>
            </tr>
            <tr>
                <th align="left">Book name</th>
                <td>{{ $books->book_name }}</td>
            </tr>
            <tr>
                <th align="left">Fikirlar</th>
                <td>{{ $books->surname }}</td>
            </tr>
            <tr>
                <th align="left">Tel raqam</th>
                <td>{{ $books->tel_raqam }}</td>
            </tr>
        </table>
        <h5>Ma'lumot so'ralgan joyga taqdim etish uchun berildi.</h5>
        <br><br><br><br><br>
        <div class="row">
            <h5 style="float: left; width:70%;">Mazkur hujjat Vazirlar Mahkamasining 2017 yil 15 sentyabrdagi 728-son qaroriga muvofiq Yagona interaktiv davlat xizmatlari portalida shakllantirilgan elektron hujjatning nusxasi bo'lib, davlat organlari tomonidan
                ushbu hujjatni qabul qilishni rad etishlari qat'iyan taqiqlanadi. Hujjat haqiqiyligini repo.gov.uz veb-saytida hujjatning 
                noyob raqamini kiritib yoki mobil telefon yordamida QR- kodni skaner qilish orqali tekshirish mumkin.</h5>
            <img src="images/qrlogo.png" style="width: 80px; height:80px; margin-left:120px;margin-top:22px;" alt="">
        </div>
        
    </div>
    
    

    <hr>
    
</body>
</html>
