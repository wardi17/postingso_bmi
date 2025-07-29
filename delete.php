<?php require 'pages/header.php'; ?>
  <?php
  
    $soTrancaid =$_POST["soTrancaid"];
    $cabangcust =$_POST["cabang"];
    $custId =$_POST["custId"];
    $userlog =$_POST["user"];
    $judul =$_POST["judul"];
  ?>
  <body>
      <!-- Loading Indicator -->
    <input type="hidden" id="soTrancaid" value="<?=$soTrancaid?>">
    <input type="hidden" id="cabangcust" value="<?=$cabangcust?>">
    <input type="hidden" id="custId" value="<?=$custId?>">
    <input type="hidden" id="user_log" value="<?=$userlog?>">
    <input type="hidden" id="kodecabang" value="">
     
  <main id="main" class="main">


  <main role="main" class="container">


    <!-- BATAS FORM -->
        <div class="card col-md-12">
          <div style="background-color:#d1e7dd;" class="card-header">
          <h4 class="text-center"><?=$judul?></h4>
          </div>
          <div class="card-body">
            <form>
            <input disabled type="hidden" id="id_header" class="form-control">
            <div class="col-md-12 row">
              <div class ="col-md-6">
                <div class="row mb-12 mb-2">
                    <label for="custid" class="col-sm-2 col-form-label">Customer</label>
                    <div class="col-sm-6">
                      <input disabled type="text" id="custid" class="form-control">
                    </div>
                </div>
                  <h5 class="text-primary mb-2">Billing Address</h5> 

                  <div class="row mb-12 mb-2">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-4">
                      <input disabled type="text" id="title" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-12 mt-4 mb-4">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-8">
                      <textarea disabled type="text" id="address" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="row mb-12 mb-2">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-6">
                      <input disabled type="text" id="phone" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-12 mb-4">
                    <label for="hp" class="col-sm-2 col-form-label">Hp</label>
                    <div style="width: 160px;" class="col-sm-6">
                      <input disabled type="text" id="hp" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-12 mb-2">
                    <label for="sodate" class="col-sm-2 col-form-label">SO Date</label>
                    <div  style="width: 160px;" class="col-sm-4">
                      <input disabled type="text" id="sodate" value="" class="datepicker_input form-control">
                    </div>
                  </div>
                  <div class="row mb-12 mb-2">
                    <label for="terms" class="col-sm-2 col-form-label">Terms</label>
                    <div  style="width: 80px;" class="col-sm-2">
                      <input disabled type="text" id="terms" class="form-control">
                    </div>
                  </div>

                  <div class="row mb-12">
                    <label for="comment" class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-8">
                      <textarea disabled type="text" id="comment" class="form-control"></textarea>
                    </div>
                  </div>
              </div>

              
              <div class ="col-md-6">
                <div class="row mb-12  mb-2">
                    <label for="bmano" class="col-sm-2 col-form-label">BMA NO</label>
                    <div style="width: 160px;" class="col-sm-4">
                      <input disabled type="text" id="bmano" class="form-control">
                    </div>
                </div>
                  <h5 class="text-primary mb-2">Shipping Address</h5> 

                  <div class="row mb-12 mb-2">
                    <label style="width: 100px;" for="contactname" class="col-sm-2 col-form-label">Contact Name</label>
                    <div class="col-sm-8">
                      <input disabled type="text" id="contactname" class="form-control">
                    </div>
                  </div>
              
                  <div class="row mb-12 mb-2">
                    <label for="title_shipping" class="col-sm-2 col-form-label">Title</label>
                    <div  class="col-sm-4">
                      <input disabled type="text" id="title_shipping" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-12 mb-2">
                    <label for="address_shipping" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-8">
                      <textarea disabled type="text" id="address_shipping" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="row mb-12 mb-2">
                    <label for="phone_shipping" class="col-sm-2 col-form-label">Phone</label>
                    <div  class="col-sm-6">
                      <input disabled type="text" id="phone_shipping" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-12 mb-2">
                    <label for="hp_shipping" class="col-sm-2 col-form-label">Hp</label>
                    <div style="width: 160px;"  class="col-sm-6">
                      <input disabled type="text" id="hp_shipping" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-12 mb-2">
                    <label for="shipdate" class="col-sm-2 col-form-label">Ship Date</label>
                    <div style="width: 160px;" class="col-sm-6">
                      <input disabled type="text" id="shipdate" class="datepicker_input form-control">
                    </div>
                  </div>
                  <div class="row mb-12 mb-2">
                    <label for="duedate" class="col-sm-2 col-form-label">DueDate</label>
                    <div style="width: 160px;" class="col-sm-6">
                      <input disabled type="text" id="duedate" class="datepicker_input form-control">
                    </div>
                  </div>

              </div>


            </div>

              </form>
          
            <!-- End General Form Elements -->

          </div>
        </div>
        <div class="card mt-4">
          <div class="car-body">
          <div id="tabeldetail" class="text-center table-responsive"></div>
          
          <div class="col-sm-12 mt-2 mb-2">
              <div class="text-center">
                <button type="btn"  id="Delete" class="btn btn-danger">Delete</button>
                <button type="btn" onclick="goBack()"  class="btn btn-secondary">Batal</button>
              </div>
          
        </div>
          </div>
        </div>


   
    <!-- tabel data  -->
    <div class="col-lg-12 mt-4">
    </main><!-- End #main -->

<script>
  $(document).ready(function(){
  
    // untuk ge data cust get api
    getcustdata();
    //end get api



    $("#Delete").on("click",function(e){
        e.preventDefault();
        let cabang = $("#cabangcust").val();
        let bmno = $("#bmano").val();
        let id_header = $("#id_header").val();

         const datadelete ={
            cabang:cabang,
            SOTransacID:bmno,
            id_header:id_header
         }
         Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Hapus Data Ini!",
                type: "warning",
                showDenyButton: true,
                confirmButtonColor: "#DD6B55",
                denyButtonColor: "#757575",
                confirmButtonText: "Ya, Hapus!",
                denyButtonText: "Tidak, Batal!",
              }).then((result) =>{
                 if(result.isConfirmed){
                  ajaxDeletePosting(datadelete);
                 }
              })
        
    })
});


function ajaxDeletePosting(datadelete){
  $.ajax({
              url:"<?=base_url?>/postingso/deleteposting",
                method:"POST",
                data:datadelete,
                dataType: "json",
                beforeSend: function(){
                      Swal.fire({
                        title: 'Loading',
                        html: 'Please wait...',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                        Swal.showLoading()
                    }
                        });
                    },
                success:function(result){
                     $pesan = result.error;
                      Swal.fire({
                      position: 'top-center',
                      icon: "success",
                      title: $pesan,
                      //confirmButtonText: "OK",
                      showConfirmButton: false,
                      timer: 100
                    }).then(function(){ 
                      goBack();
                    });
                    }
               
        });
}




 

// untuk add ke tabel bawah
// function TemptPosting(){
//   let id_header = $("#id_header").val();

//   let custid = $("#custid").val();
//   let cabang = $("#cabangcust").val();
//  // let total = $("#total").val();
//   let subtotal = $("#sub_total").text();
//   let total = jQuery.trim(subtotal);
//   let userlog = $("#user_log").val();
//   let bmno = $("#bmano").val()




//    let header ={
//     'userlog' :userlog,
//     'id_header':id_header,
//     'custid':custid,
//     'cabang':cabang,
//     'total' :total,
//     'sobma' :bmno
//    }

//       const jsonhead = JSON.stringify(header);
//       //const jsondetail = JSON.stringify(arraytabel);
//       datas ={
//         'datahead':jsonhead
//       };
     
//                $.ajax({
//               url:"<?=base_url?>/postingso/posting",
//                 method:"POST",
//                 data:datas,
//                 dataType: "json",
//                     success:function(result){
//                       Swal.fire({
//                         position: 'top-center',
//                         icon: 'success',
//                         showConfirmButton: false,
//                         timer:500
//                     })
//                     }
               
//         });

// }

function goBack(){
   let cabang = $("#cabangcust").val();
  
  const  halamanSebelumnya ="<?=base_url2?>";
  let varcabang ="?varcabang=";
  let urldata = halamanSebelumnya+varcabang+cabang;
 
  window.location.replace(urldata)

    } 




// fungsi untuk get cust
 function getcustdata(){
  const custid = $("#custId").val();
  const cabang = $("#cabangcust").val();
  const  sotrancatid = $("#soTrancaid").val();
  let datas ={
      custid,cabang,sotrancatid
  }
 
   // let id_header = 735;
    $.ajax({
      url:"<?=base_url?>/postingso",
        method:"POST",
        data:datas,
        dataType: "json",
        beforeSend: function() {
          Swal.fire({
                        title: 'Sedang Menampilkan Data',
                        html: 'Please wait...',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                        Swal.showLoading()
                    }
                        });
        },
        success:function(result){
             
          const orderhider = result.orderhider
          const customer = result.customerdata
          setOrderhider(orderhider);
          setDataCutomer(customer);
                  Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        showConfirmButton: false,
                        timer:500
                    })
        }
    })
 }

 function setOrderhider(orderhider){
  let id_header = "";
          let custid ="";
          let cabang ="";
          let total = "";
          let noso ="";
          Total  ="";
          let komen ="";
          let alamat="";
          let shipdate ="";
          let sodate ="";
          let duedate ="";
          let tabel =``;

              tabel +=`
              <table id="tabeldetail" class='table table-bordered border-primary' style='width:100%'>                    
                                                    <thead class="table-success">
                                                    <tr>         
                                                                <th class="text-center">No</th>
                                                                <th class="text-start">Partid</th>
                                                                <th class="text-start">Partname</th> 
                                                                <th class="text-end">Unit Price (Rp)</th> 
                                                                <th class="text-end">Qty</th>
                                                                <th class="text-end">Discount (%)</th>
                                                                <th style = "display:none" ></th>
                                                                <th style = "display:none" ></th>
                                                                <th class="text-end">Amount (Rp)</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
              `;  
              let no = 1;
             let sumtotal =[];
          $.each(orderhider,function(key,value){
            custid = value.id_cust;
             cabang = value.cabang;
             total = value.total;
             id_header = value.id_header;
             noso = value.sotransacid;
             komen =value.komen;
             alamat=value.alamat;
             sodate = value.sodate;
             shipdate = value.shipdate;
             duedate = value.duedate;
             tabel +=`
                  <tr>
                  <td>${no++}</td>
                  <td class="text-start">${value.partid}</td>
                  <td class="text-start">${value.partname}</td>
                  <td class="text-end">${value.price}</td>
                  <td class="text-end">${value.qty}</td>
                  <td class="text-end">${value.disc}</td>
                  <td style = "display:none" >${value.hargax}</td>
                  <td style = "display:none" >${value.isi}</td>
                  <td class="amount-value text-end">${value.amount}</td>
                  </tr>
             `;

          });
          tabel +=`</tbody><tfoot id="tfoot" class="text-end table-success"></tfoot>
          </table>`;
       
          $("#tabeldetail").empty().html(tabel);

         
          $("#total").val(total);
          $("#id_header").val(id_header);
          $("#bmano").val(noso);
          $("#comment").val(komen);
          $("#address_shipping").val(alamat);
          $("#sodate").val(sodate);
          $("#shipdate").val(shipdate);
          $("#duedate").val(duedate);
          $("#kodecabang").val(cabang);

          tambhatotal();

       
 }


 //data customer 
 function setDataCutomer(customer){
     
                      
     $.each(customer,function(key,value){
         let title_bil = value.CustCoTitle;
         let CustBillAddress = value.CustBillAddress;
         let CustTelpNo = value.CustTelpNo;
         let HandPhone = value.HandPhone;
         let term_code = value.term_code;
         let CustComment =value.CustComment;
         let CustName = value.CustName;
         let CustDelAddress = value.CustDelAddress;
         let CustomerID = value.CustomerID;
         const cust_co_name = value.cust_co_name;
         $("#title").val(title_bil);
        
         $("#phone").val(CustTelpNo);
         $("#hp").val(HandPhone);
         $("#terms").val(term_code);
         $("#contactname").val(CustName);
         $("#address").val(CustDelAddress);
         $("#phone_shipping").val(CustTelpNo);
         $("#hp_shipping").val(HandPhone);
         $("#custid").val(CustomerID);
         $("#title_shipping").val(cust_co_name);
      
   });
 
}




//and
// untuk set tanggal
  function settanggal(){
    var d = new Date();
  var month = d.getMonth()+1;
  var day = d.getDate();
  let  output = (day<10 ? '0' : '') + day + '/' +
                  (month<10 ? '0' : '') + month + '/' +
                  d.getFullYear() ;
              

  
    document.getElementById("sodate").value = output;
    document.getElementById("shipdate").value = output;
    $("#duedate").val(output);
    $('#sodate').datepicker({
        format: 'dd/mm/yyyy', // Sesuaikan dengan format tanggal yang diinginkan
        autoclose: true
    });

    $('#shipdate').datepicker({
        format: 'dd/mm/yyyy', // Sesuaikan dengan format tanggal yang diinginkan
        autoclose: true
    });
  }

//and

 function tambhatotal(){

      var total = 0;
        $('.amount-value').each(function() {
           let amonut =$(this).text();
          
           let riplace =replacekoma(amonut);
           let value = parseInt(riplace); // Mengambil nilai dari elemen dan mengubahnya menjadi angka (integer)
          total += value; // Menambahkan nilai ke total
        });
         let addtotal = addCommas(total);
      
        let tfoot =`
        <tr>
            <td colspan="6" class="text-end">Total
            </td>
            <td id="sub_total">
            ${addtotal}
            </td>
          </tr>
        `;
          $("#tfoot").empty().html(tfoot);
    }
//end get cust

//foramt number
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
//and 

// untuk replace mengilakan koma
  function replacekoma(str){
    return str.replace(/,/g,"");
  }

//and

</script>
  
<?php require 'pages/footer.php'; ?>


  