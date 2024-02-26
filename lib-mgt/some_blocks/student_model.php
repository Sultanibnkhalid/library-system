
<div>
<div class="col-12 ">
<span class="close btn btn-danger" >&times;</span>
<div class="row g-3">
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>


                  <div class="col">
                    <div class="card shadow-sm">
                      <img id="student_img" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2" method="POST" action=""  name="form1" id="form1" enctype="multipart/form-data">
                    <div class="input-group">
                      <input type="file" id="student_inputfile" name="student_inputfile" accept="image/*"  class="form-control" placeholder="اختيار صورة">

                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary  btn-lg" id="student_submit_button">حفظ التعديل</button>
                    <button class="w-100 btn btn-outline-danger cancel btn-lg " >الغاء</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">تعديل بيانات الطالب </h4>
                  <h4 class="mb-3" id="h_error"></h4>
                  <form class="needs-validation" action="">
                    <div class="row g-3">
                      <div class="col-sm-12">
                        <label for="student_name" class="form-label">الاسم </label>
                        <input type="text" class="form-control  rq" id="student_name" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح صحيح.
                        </div>
                      </div>
                      <!-- add pattern to the input -->
                      <div class="col-sm-6">
                        <label for="student_phone" class="form-label">رقم الهاتف</label>
                        <input type="number" class="form-control  rq" id="student_phone" placeholder="" value="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال رقم هاتف صحيح.
                        </div>
                      </div>


                      <div class="col-6">
                        <label for="student_Unumber" class="form-label">الرقم الجامعي</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="number" class="form-control  rq" id="student_Unumber" placeholder="الرقم الجامعي" required="true">
                          <div class="invalid-feedback">
                            الرقم الجامعي مطلوب.
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <label for="student_collage" class="form-label">الكلية</label>
                        <select class="form-select  rq" id="student_collage" required="">

                        </select>
                        <div class="invalid-feedback">
                          كلية بشكل صحيح.
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="student_department" class="form-label">القسم</label>
                        <select class="form-select  rq" id="student_department" required="">

                        </select>
                        <div class="invalid-feedback">
                          يرجى اختيار اسم القسم بشكل صحيح.
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="student_gander" class="form-label">النوع</label>
                        <select class="form-select" id="student_gander" required="">
                          <option value="ذكر">ذكر</option>
                          <option value="انثى">انثى</option>
                        </select>
                        <div class="invalid-feedback">
                          يرجى اختيار النوع بشكل صحيح.
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="studen_temail" class="form-label">البريد الإلكتروني <span class="text-muted">(اختياري)</span></label>
                      <input type="email" class="form-control" id="student_email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        يرجى إدخال عنوان بريد إلكتروني صحيح لاستعادة كلمة المرور .
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="student_address" class="form-label">العنوان</label>
                      <input type="text" class="form-control" id="student_address" placeholder="ذمار شارع رداع" required="">
                      <div class="invalid-feedback">

                      </div>
                    </div>


                    <hr class="my-4">


                  </form>
                </div>
             



                </div>
</div>
</div>