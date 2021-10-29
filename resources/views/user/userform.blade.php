<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1,user-scalable=no,width=device-width">
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('user/assets/css/custom.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('user/assets/js/custom.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>

<style>
    .form-control {
        padding: 25px !important;
    }
</style>

<div id="svg_wrap"></div>
<div class="text-center">
    <h1>EZZYH PLAN [Application Form]</h1>
    @if($ban)
    <img src="{{asset('/uploads/banners/'.$ban->banner)}}" alt="" style="width:400px;height:150px;">
    @endif
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<form  action="{{route('storeUserform',['id'=>$id])}}" method="post" >
    @csrf
<section id="myForm">
    <b>Personal information</b>
    <div class="row">
        <div class="col-md-12">
            <input type="text" class="form-control mb-2" placeholder="Enter Dealer's Code / Masukkan Kod Dealer *" name="dealer_code" required />
            <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="fullname" required />

            <div class=" mb-2">
                <label> <b> RACE / BANGSA * </b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="race" value="Malay" checked required>Malay
                    <label class="form-check-label"> </label>
                </div>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="race" value="Chinese" required>Chinese
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="race" value="Indian" required>Indian
                    </label>
                </div>
                <div class="form-check m-0">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="race" value="Other" required>Other
                    </label>
                </div>
            </div>

            <input type="text" class="form-control mb-2" placeholder="IC NUMBER *" name="ic_number" required />

            <div class="mb-2">
                <label><b>SEX / JANTINA *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="gender" value="Male" checked required>Male
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="gender" value="Female" required>Female
                    <label class="form-check-label"> </label>
                </div>
            </div>

            <div class=" mb-2">
                <label><b>HOUSING STATUS / STATUS RUMAH *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="STATUS" value="Rental / Sewa" checked required>Rental / Sewa
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="STATUS" value="Own Property / Rumah Sendiri" required>Own Property / Rumah Sendiri
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="STATUS" value="Family's Property / Rumah Keluarga" required>Family's Property / Rumah Keluarga
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="STATUS" value="Company's Property / Rumah Syarikat" required>Company's Property / Rumah Syarikat
                    <label class="form-check-label"> </label>
                </div>
            </div>
            <div class=" mb-2">
                <label><b>MARTIAL STATUS / PERKAHWINAN *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="MARTIAL" value="Single / Bujang" checked required>Single / Bujang

                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="MARTIAL" value="Married / Berkahwin" required>Married / Berkahwin
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="MARTIAL" value="Divorced / Bercerai" required>Divorced / Bercerai
                    <label class="form-check-label"> </label>
                </div>
            </div>

            <div class="mb-2">
                <label><b>BANK NAME / NAMA BANK *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="MAYBANK" checked required>MAYBANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="CIMB" required>CIMB
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="AFFIN BANK" required>AFFIN BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="AFFIN ISLAMIC BANK" required>AFFIN ISLAMIC BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="BANK ISLAM" required>BANK ISLAM
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="BANK KERJASAMA RAKYAT" required>BANK KERJASAMA RAKYAT
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="BANK SIMPANAN NASIONAL" required>BANK SIMPANAN NASIONAL
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="HONG LEONG BANK" required>HONG LEONG BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="PUBLIC BANK" required>PUBLIC BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="RHB BANK" required>RHB BANK
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="BANK" value="Other" required>Other
                    <label class="form-check-label"> </label>
                </div>
            </div>

            <div class=" mb-2">
                <label><b>TYPE OF ACCOUNT / JENIS AKAUN *</b></label>

                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="ACCOUNT" value="SAVINGS" checked required>SAVINGS
                    <label class="form-check-label"> </label>
                </div>
                <div class="form-check m-0">
                    <input type="radio" class="form-check-input" name="ACCOUNT" value="CURRENT" required>CURRENT
                    <label class="form-check-label"> </label>
                </div>
            </div>

            <input type="text" class="form-control mb-2 mt-2" placeholder="ACCOUNT NUMBER / NO AKAUN *" name="account_no" required />
            <input type="text" class="form-control mb-2" placeholder="ACCOUNT HOLDER NAME / PENAMA AKAUN *" name="account_name" required />
            <input type="text" class="form-control mb-2" placeholder="Email *" name="email" required />

        </div>
    </div>
</section>

<section>
    <b>Upload Document</b>
    <div id="camera" ></div>

    <!--FOR THE SNAPSHOT-->
    <input type="button" value="Take a Snap" id="btPic" onclick="takeSnapShot()" /> 
    <p id="snapShot"></p>
</section>

<section >
    <b>Address</b>
    <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="fullname" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="address1" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="address2" required />
    <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="postcode" required />
    <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="city" required />
    <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="state" required />
    <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="hanphone_no" required />

    <div class=" mb-2">
        <label><b>LENGTH OF STAY / TEMPOH MENETAP *</b></label>

        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LENGTH" value="Below 1 year" checked required>Below 1 year

            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LENGTH" value="1 - 3 years" required>1 - 3 years
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LENGTH" value="4 - 10 years" required>4 - 10 years
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LENGTH" value="Above 10 years" required>Above 10 years
            <label class="form-check-label"> </label>
        </div>
    </div>
    <div class=" mb-2">
        <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>

       
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="9 AM - 10 AM" required>9 AM - 10 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="10 AM - 11 AM" required>10 AM - 11 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="11 AM - 12 PM" required>11 AM - 12 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="12 PM - 1 PM" required>12 PM - 1 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="1 PM - 2 PM" required>1 PM - 2 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="2 PM - 3 PM" required>2 PM - 3 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="3 PM - 4 PM" required>3 PM - 4 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="4 PM - 5 PM" required>4 PM - 5 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="ANYTIME" required>ANYTIME
            <label class="form-check-label"> </label>
        </div>
    </div>



</section>

<!-- step 3 -->
<section>
    <b >EMERGENCY CONTACT 1 (ECP1)</b>
    <br>
    <br>
    <div class=" mb-2">
        <label><b>RELATIONSHIP / HUBUNGAN *</b></label>

        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!" checked>Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Siblings / Adik-beradik">Siblings / Adik-beradik
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Parent / Ibu Bapa">Parent / Ibu Bapa
            <label class="form-check-label"> </label>
        </div>
    </div>


    <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="fullname" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="address1" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="address2" required />
    <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="postcode" required />
    <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="city" required />
    <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="state" required />
    <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="hanphone_no" required />



    <div class=" mb-2">
        <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>

        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="9 AM - 10 AM">9 AM - 10 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="10 AM - 11 AM">10 AM - 11 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="11 AM - 12 PM">11 AM - 12 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="12 PM - 1 PM">12 PM - 1 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="1 PM - 2 PM">1 PM - 2 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="2 PM - 3 PM">2 PM - 3 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="3 PM - 4 PM">3 PM - 4 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="4 PM - 5 PM">4 PM - 5 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="ANYTIME">ANYTIME
            <label class="form-check-label"> </label>
        </div>
    </div>


</section>

<!-- step 4 -->
<section>
    <b>EMERGENCY CONTACT 2 (ECP2)</b>
    <p>Mesti orang lain. Jangan isi nama sama dengan ECP1</p>
    <div class=" mb-2">
        <label><b>RELATIONSHIP / HUBUNGAN *</b></label>

        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!" checked>Spouse / Pasangan [SUAMI ISTERI SAHAJA] tunang, bf, gf TAK DIBENARKAN!!!
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Siblings / Adik-beradik">Siblings / Adik-beradik
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Parent / Ibu Bapa">Parent / Ibu Bapa
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="RELATIONSHIP" value="Relatives / Saudara">Relatives / Saudara
            <label class="form-check-label"> </label>
        </div>
    </div>

    <input type="text" class="form-control mb-2" placeholder="FULL NAME / NAMA PENUH *" name="fullname" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 1 ] *" name="address1" required />
    <input type="text" class="form-control mb-2" placeholder="ADDRESS / ALAMAT [ Line 2 ] *" name="address2" required />
    <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="postcode" required />
    <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="city" required />
    <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="state" required />
    <input type="text" class="form-control mb-2" placeholder="HANPHONE NO *" name="hanphone_no" required />

    <div class=" mb-2">
        <label><b>BEST TIME TO CALL / WAKTU UNTUK DIHUBUNGI *</b></label>

       
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="9 AM - 10 AM">9 AM - 10 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="10 AM - 11 AM">10 AM - 11 AM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="11 AM - 12 PM">11 AM - 12 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="12 PM - 1 PM">12 PM - 1 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="1 PM - 2 PM">1 PM - 2 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="2 PM - 3 PM">2 PM - 3 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="3 PM - 4 PM">3 PM - 4 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="4 PM - 5 PM">4 PM - 5 PM
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CALL" value="ANYTIME">ANYTIME
            <label class="form-check-label"> </label>
        </div>
    </div>

</section>

<!-- step 5 -->

<section>
    <input type="text" class="form-control mb-2" placeholder="TYPE OF OCCUPATION / JENIS PEKERJAAN *" name="occupation_type" required />
    <div class=" mb-2">
        <label><b>NATURE OF WORK / BIDANG PEKERJAAN *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="GOVERNMENT / KERAJAAN" checked>GOVERNMENT / KERAJAAN
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="FINANCE / BANKING">FINANCE / BANKING
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="LOGISTIC">LOGISTIC
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="MANUFACTURE / KILANG">MANUFACTURE / KILANG
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="RETAIL">RETAIL
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="SERVICES">SERVICES
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="CONSTRUCTION">CONSTRUCTION
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="TRANSPORT">TRANSPORT
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="SELF EMPLOYED / KERJA SENDIRI">SELF EMPLOYED / KERJA SENDIRI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="NATURE" value="Other">Other
            <label class="form-check-label"> </label>
        </div>
    </div>

    <input type="text" class="form-control mb-2" placeholder="YEARS OF SERVICE / TEMPOH BERKHIDMAT * " name="service_year" required />
    <input type="text" class="form-control mb-2" placeholder="SALARY DATE / TARIKH GAJI * " name="salary_date" required />
    <input type="text" class="form-control mb-2" placeholder="SALARY / GAJI *" name="salary" required />

    <div class=" mb-2">
        <label><b>EMPLOYMENT STATUS / STATUS PEKERJAAN *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="EMPLOYMENT" value="CONTRCT / KONTRAK" checked>CONTRCT / KONTRAK
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="EMPLOYMENT" value="PERMANENT / TETAP">PERMANENT / TETAP

            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="EMPLOYMENT" value="SELF EMPLOYED / BEKERJA SENDIRI">SELF EMPLOYED / BEKERJA SENDIRI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="EMPLOYMENT" value="COMISSION / KOMISYEN">COMISSION / KOMISYEN
            <label class="form-check-label"> </label>
        </div>
    </div>

    <input type="text" class="form-control mb-2" placeholder="COMPANY NAME / NAMA SYARIKAT" name="company_name" required />
    <input type="text" class="form-control mb-2" placeholder="COMPANY ADDRESS / ALAMAT SYARIKAT [ Line 1 ] *" name="" required />
    <input type="text" class="form-control mb-2" placeholder="COMPANY ADDRESS / ALAMAT SYARIKAT [ Line 2 ] *" name="company_address" required />
    <input type="text" class="form-control mb-2" placeholder="POSTCODE / POSKOD *" name="company_postcode" required />
    <input type="text" class="form-control mb-2" placeholder="CITY / BANDAR *" name="company_city" required />
    <input type="text" class="form-control mb-2" placeholder="STATE / NEGERI *" name="company_state" required />
    <input type="text" class="form-control mb-2" placeholder="OFFICE NUMBER / NO TEL SYARIKAT *" name="office_no" required />

</section>

<!-- STEP 6 -->
<section>
    <div class=" mb-2">
        <label><b>BRAND *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" value="APPLE" checked>APPLE
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" value="SAMSUNG">SAMSUNG
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" value="OPPO">OPPO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" value="VIVO">VIVO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" value="HUAWEI">HUAWEI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" value="ONE PLUS">ONE PLUS

            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0"> 
            <input type="radio" class="form-check-input" name="BRAND" value="ASUS">ASUS
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" value="XIAOMI">XIAOMI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="BRAND" value="REALME">REALME
            <label class="form-check-label"> </label>
        </div>

    </div>

    <div class=" mb-2">
        <label><b>MODEL *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 11" checked>IPHONE 11
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="IPHONE SE">IPHONE SE

            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 MINI">IPHONE 12 MINI
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12">IPHONE 12
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 PRO">IPHONE 12 PRO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="IPHONE 12 PRO MAX">IPHONE 12 PRO MAX
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG Z FLIP">SAMSUNG Z FLIP
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG Z FOLD 2">SAMSUNG Z FOLD 2
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG NOTE 20 5G">SAMSUNG NOTE 20 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG NOTE 20 ULTRA 5G">SAMSUNG NOTE 20 ULTRA 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 5G">SAMSUNG S21 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 PLUS 5G">SAMSUNG S21 PLUS 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG S21 ULTRA 5G">SAMSUNG S21 ULTRA 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A72">SAMSUNG A72
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A52 5GB">SAMSUNG A52 5GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG A52">SAMSUNG A52
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG TAB S7">SAMSUNG TAB S7
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="SAMSUNG TAB S7 PLUS">SAMSUNG TAB S7 PLUS
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 9 5G">ONEPLUS 9 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 9 PRO 5G">ONEPLUS 9 PRO 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS 8T">ONEPLUS 8T
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="ONEPLUS NORD CE 5G">ONEPLUS NORD CE 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI P40 PRO">HUAWEI P40 PRO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI P40">HUAWEI P40
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI MATE 40 PRO">HUAWEI MATE 40 PRO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="HUAWEI NOVA 8I">HUAWEI NOVA 8I
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="OPPO FIND X3 PRO">OPPO FIND X3 PRO
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5 PRO 5G">OPPO RENO 5 PRO 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5 5G">OPPO RENO 5 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="OPPO RENO 5F">OPPO RENO 5F
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="OPPO A74 5G">OPPO A74 5G
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="MODEL" value="OPPO A74">OPPO A74
            <label class="form-check-label"> </label>
        </div>

    </div>

    <div class=" mb-2">
        <label><b>CAPACITY *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY" value="64GB">64GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY" value="128GB">128GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY" value="256GB">256GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY" value="512GB">512GB
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="CAPACITY" value="1TB">1TB
            <label class="form-check-label"> </label>
        </div>
    </div>

    <div class=" mb-2">
        <label><b>LOAN TENURE *</b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN" value="12 MONTHS">12 MONTHS
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN" value="24 MONTHS">24 MONTHS
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN" value="36 MONTHS">36 MONTHS
            <label class="form-check-label"> </label>
        </div>
    </div>
</section>

<section>
<p>X-Tream Protect Plan merupakan warranty tambahan exclusive untuk phone yang masih ada warranty dengan authorised service centre.</p>
    <img src="{{asset('user/assets/img/docimg.jpg')}}" class="w-100 mb-3 mt-2" >
    <label><b>Apa Yang Anda Akan Dapat? </b></label>
    <p><b>Extended Warranty 1 Tahun</b></p>
    <p>-Warranty phone anda akan ditambah lagi 1 tahun menjadi 2 tahun.
        -Anda akan mendapat manfaat perlindungan yg sama seperti 1 tahun yg pertama.</p>

    <p><b>Screen Protect</b></p>
    <p>-Penukaran screen original secara PERCUMA jika screen mengalami sebarang jenis kerosakan.
        - Tidak menggangu warranty asal kerana phone akan dibaiki di authorised centre.</p>

    <p><b>Berapa Harga Plan Ni?</b></p>
    <p>Harga untuk pakej exclusive ni adalah RM299. Tapi dapatkan harga promo limited dengan hanya RM199 sahaja.
    <p>Anda boleh pilih pembayaran melalui Ezzyh Plan atau secara cash. </p>
    <p>Jadual Pembayaran :</p>
    <p>36 month : RM8/month <br>24 month : RM11/month <br>12 month : RM19/month</p>

    <div class=" mb-2">
        <label> <b>Adakah anda berminat untuk apply X-Tream Protect Plan? * </b></label>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN" value="Ya, saya berminat, pembayaran melaui Ezzyh Plan">Ya, saya berminat, pembayaran melaui Ezzyh Plan
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN" value="Ya, saya berminat, pembayaran melalui cash">Ya, saya berminat, pembayaran melalui cash
            <label class="form-check-label"> </label>
        </div>
        <div class="form-check m-0">
            <input type="radio" class="form-check-input" name="LOAN" value="Tidak, saya tidak berminat">Tidak, saya tidak berminat
            <label class="form-check-label"> </label>
        </div>
    </div>

</section>

<div class="text-center">
    <div class="button" id="prev">&larr; Previous</div>
    <div class="button" id="next">Next &rarr;</div>
    <button type="submit" class="button" id="submit">Submit</button>
</div>
</form>



<script >
    // CAMERA SETTINGS.
    Webcam.set({
        width: 244,
        height: 190,
        image_format: 'jpeg',
        jpeg_quality: 100,
        
    });
    Webcam.attach('#camera');

    // SHOW THE SNAPSHOT.
    takeSnapShot = function () {
        Webcam.snap(function (data_uri) {
            document.getElementById('snapShot').innerHTML = 
                '<img src="' + data_uri + '" width="250px" height="150px" /><input type="hidden" name="document" value='+data_uri+'>';
        });
    }
</script>