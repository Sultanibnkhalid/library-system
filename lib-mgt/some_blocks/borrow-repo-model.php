<div class="modal fade" id="U" tabindex="-1" style="display: none;z-index: 9999;opacity:100; " aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" id="mo-repo-container">

            <div class="modal-header">
                <button type="button" class="cancel-change btn btn-close btn-outline-danger  border rounded btn-lg" data-bs-dismiss="modal" aria-label="إغلاق" style="border: 1px solid red!important;"></button>
            </div>
            <div class="modal-body" id="content-to-print">

                <form class="row" id="Pcontent">

                    <div class="row mb-1 ">


                        <div class="cpl-12">
                            <div class="col-4" style="float: left;direction: ltr;">

                                <SCRIPT LANGUAGE="JavaScript">
                                    Stamp = new Date();
                                    year = Stamp.getYear();
                                    if (year < 2000) year = 1900 + year;
                                    document.write('<font size="2" face="Arial"><B>' + (Stamp.getMonth() + 1) + "/" + Stamp.getDate() + "/" + year + ' </B></font><br>');
                                </SCRIPT>
                                <script>
                                    var Hours;
                                    var Mins;
                                    var Time;
                                    Hours = Stamp.getHours();
                                    if (Hours >= 12) {
                                        Time = " P.M.";
                                    } else {
                                        Time = " A.M.";
                                    }
                                    if (Hours > 12) {
                                        Hours -= 12;
                                    }
                                    if (Hours == 0) {
                                        Hours = 12;
                                    }
                                    Mins = Stamp.getMinutes();
                                    if (Mins < 10) {
                                        Mins = "0" + Mins;
                                    }
                                    document.write('<font size="2" face="Arial"><B>' + Hours + ":" + Mins + Time + '</B></font>');
                                </script>
                            </div>

                            <div class="col-4" style="float: left;">

                                <img src="../small_logo.png" width="70" height="70" class="d-inline-block align-top" alt="Bootstrap" loading="lazy" style="background-color: #2795b6;margin-right: 50px;">


                            </div>
                            <div class="col-4">
                                <p>رقم العملية</p>

                                <p style="border: 1px solid #ced4da; background-color: #e9ecef;" id="repo-op-no"> 129</p>
                            </div>


                        </div>

                        <hr class="row mb-0">
                    </div>
                    <div class="col-12">
                        <p class=" mb-2 text-primary" style="text-align: center;font-size: larger;"> ------ سند اعارة ------ </p>
                    </div>
                    <hr class="mt-0">


                    <p class="col-12 text-dark" style="font-weight: bold;float: right;border-bottom: 1px solid;">معلومات المستعير :</p>





                    <div class="col-12">
                        <p class="col-2 text-primary" style="font-weight: bold;float: right;">الاسم :</p>
                        <p class="col-10 text-black" style="font-weight: bold;float: right;border-bottom: 1px solid darkgray;" id="repo-person">اسم الطالب</p>

                    </div>
                    <br>
                    <hr>
                    <!-- <div class="col-12">
                                <p class="col-2 text-primary" style="font-weight: bold;float: right;">رقم الهاتف:</p>
                                <p class="col-10 text-black" style="font-weight: bold;float: right;border-bottom: 1px solid darkgray;">اسم الطالب</p>

                            </div> -->





                    



                    <div class="col-12" id="repo-books">
                    <p class="col-12 text-dark" style="font-weight: bold;float: right;border-bottom: 1px solid;">معلومات الكتاب :</p>
                    <br>
                        <ul id="b-repo-ul">

                        </ul>
                        <!-- <p class=" text-dark" style="border-bottom: 1px solid darkgray;" >          .</p> -->


                    </div>



                    <div class="col-12">
                        <p class="col-3 text-primary" style="font-weight: bold;float: right;"> تاريخ الارجاع :</p>
                        <p class="col-3 text-black" style="font-weight: bold;float: right;border-bottom: 1px solid darkgray;" id="repo-date">02/12/2022 </p>
                        <p class="col-6 text-primary" style="font-weight: bold;float: left;"> :</p>

                    </div>

                    <p class="col-12 text-dark" style="font-weight: bold;float: right;border-bottom: 1px solid;">الملاحظات :</p>
                    <div class="col-12">

                        <p class=" text-dark" style="border-bottom: 1px solid darkgray;" id="repo-notice"> .</p>


                    </div>

                </form>
            </div>
            <div class="modal-footer" style="justify-content: space-between;">
                <button type="button"   class="cancel-change btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" id="btn-print-repo" onclick="printElement()" class="btn btn-primary">طباعة </button>
            </div>
        </div>
    </div>
</div>