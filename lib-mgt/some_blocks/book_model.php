<div>
    <div class="col-12" id="book-model">
    <span class="close btn btn-danger" >&times;</span>
    <div class="row g-3">
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>


                  <div class="col">
                    <div class="card shadow-sm">
                      <label for="book_cover_img" class="form-label">صورة الغلاف</label>
                      <img id="book_cover_img" src="#" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2">
                    <div class="input-group">
                      <input type="file" id="book_inputfile" class="form-control"  placeholder="اختيار صورة">

                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary  btn-lg"  id="update_book">حفظ التعديل</button>
                    
                    <button class="w-100 btn  btn-outline-danger cancel btn-lg " >الغاء</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">بيانات الكتاب</h4>
                  <h4 class="mb-3" id="h_error"></h4>
                  <form class="needs-validation" action="#">
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label for="book_title" class="form-label">عنوان الكتاب</label>
                        <input type="text" class="form-control rq" id="book_title" placeholder="" required="true">
                        <div class="invalid-feedback">
                          <!-- يرجى إدخال الاسم بشكل صحيح صحيح. -->
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label for="book_author" class="form-label">المؤلف</label>
                        <input type="text" class="form-control rq" id="book_author" placeholder="" value="" required="true">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="book_subject" class="form-label">موضوع الكتاب</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="text" class="form-control  rq" id="book_subject" required="true">
                          <div class="invalid-feedback">
                            مطلوب
                            <!--  -->
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="book_publisher" class="form-label">الناشر</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="text" class="form-control  rq" id="book_publisher" placeholder="الناشر" required="true">
                          <div class="invalid-feedback">
                             مطلوب.
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="book_category" class="form-label"> تصنيف الكتاب</label>
                        <select class="form-select rq" id="book_category" required="">

                        </select>
                        <div class="invalid-feedback">
                          الرجاء تحديد الصنف بشكل صحيح.
                        </div>
                      </div>
                     
                      <div class="col-6">
                        <label for="publish_date" class="form-label">تاريخ النشر </label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="date" class="form-control rq" id="publish_date" value="2020-01-10" required="true">
                          <div class="invalid-feedback">
                            <!-- j -->
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-12">
                        <label for="book_locker_no" class="form-label">مكان الكتاب</label>
                        <input type="text" class="form-control" id="book_locker_no" placeholder="">
                        <div class="invalid-feedback">
                          <!-- مكان -->
                        </div>
                      </div>

                      <div class="col-4">
                        <label for="book_copies" class="form-label">عدد النسخ المطبوعة</label>
                        <input type="number" min="0" value="0" class="form-control  " id="book_copies" required="">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="book_pages" class="form-label">عدد صفحات الكتاب</label>
                        <input type="number" min="0" value="0" class="form-control" id="book_pages" required="">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="book_status" class="form-label">حالة الكتاب</label>
                        <select class="form-select rq" id="book_status" required="">
                          <option value="0">غير متاح</option>
                          <option value="1">متاح</option>
                        </select>
                        <div class="invalid-feedback">
                          حالة الكتاب على النت
                          <!--  -->
                        </div>
                      </div>

                      <hr class="my-4">

                    </div>
                  </form>
                </div>
              </div>


    </div>
</div>