<?php require 'pages/header.php'; 
require 'pages/filtercomp.php'; 
?>
<style>
      input[type="file"]{
        display: none;
    }
  </style>
<body>

<!-- <h5 class="text-star"> TEMPO ANYAR SO</h5> -->

<?php 

$userlog =$mar;


$varcabang = (isset($_GET["varcabang"]))? $_GET["varcabang"] : '';

?>
 <main role="main" class="container">
  
<!-- BATAS FORM -->
<div  class="card">
      <div class="card-header">
      <h2 class="text-center"></h2>
      </div>
      <div class="card-body">
      <input type="hidden" id="IDcomp" class="form-control" value="<?=$varcabang?>">
                      <div  style="width:60%;" class="row col-md-6 mt4">
                                              <label style="width:15%;"  for="CompanyID" class="col-sm-2 col-form-label">Cabang:</label>
                                              <div style="width:25%;" class="col-sm-4">
                                              <select class="form-control" id="CompanyID">
                                              <option selected="selected">Please Select </option>
                                          <?php  foreach($comp as $file => $key):
                                                $kode = $key;
                                                $nama = $file;
                                              
                                            ?>
                                                <option value="<?= $kode ?>"><?= $nama ?></option>
                                        <?php endforeach;?> 
                                              </select>
                                      </div>
                      
                               <div style="width:5%;"  class="col-sm-2">
                                    <button  type="submit" name="submit" class="btn btn-primary me-1 mb-3" id="Createdata">Submit</button>
									          </div>
                </div>
      </div>
    </div>
    <div id="itemTabel"></div>

  </main>                                   

      

<script>
  $(document).ready(function(){
    let IDcomp= $("#IDcomp").val();
    if(IDcomp !==""){
      let setcomp =IDcomp;
      let companyID = setcomp;
      $("#CompanyID").val(companyID).trigger("change");
      getDataCompany(companyID);
    }
   $("#Createdata").on("click",function(e){
      e.preventDefault();
     
      const companyID =  $("#CompanyID").find(":selected").val();
        if(companyID =="Please Select"){
          //alert("Silah kan pilih dulu commpanyid")
          Swal.fire({
                      position: 'top-center',
                      icon: "info",
                      title:"Silah kan pilih dulu Cabang",
                      showConfirmButton: true,
                       //timer: 1500
                    })
        }else{

          getDataCompany(companyID);
        }
    })


   $(document).on("change","#attach",function(){ 
              
            let at = $('#attach').prop('files');
            let  sotranid = $("#SotransaId").val();

            post_dataAtter(at,sotranid);
        });

  })




  function getDataCompany(companyID){
    $.ajax({
                url:"<?=base_url?>/listposting/getlistsoatasan",
                method:"POST",
                data:{companyid:companyID},
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
                    getListItem();
                      Swal.fire({
                      position: 'top-center',
                      icon: "success",
                      showConfirmButton: false,
                       timer: 1500
                    }).then(function(){ 
                      let mjudul ="";
                      $.each(result,function(key,value){
                        mjudul= value.mjudul;
                      })
                      let title =`
                              <div  class="page-heading mb-3">
                                  <div class="page-title">
                                  <h4 class="text-center">${mjudul}</h4>
                                  </div>
                              </div>`;
                        $("#title").empty().html(title);
                      setData(result);
                    })
                }
           })
  }

  function SetComp(IDcomp){
    let id;
    if(IDcomp =="02"){
      id ="bambi-mg2";
    }else if(IDcomp =="04"){
      id ="bambi04";
    }else if(IDcomp =="dummy"){
      id ="dummy";
    }else{
      id =IDcomp;
    }

     return id;
  }

  function getListItem(){
     const item =`<div class="card mt-4">
    <div style="background-color:#d1e7dd;" class="card-header">
      <h2 class="text-center"><div id="title"></div></h2>
      </div>
      <div class="card-body">
      <div id="tabellist"></div>
      </div>
      
  </div>`;
  $("#itemTabel").empty().html(item);
  }
  function setData(result){
    let CompanyID = $("#CompanyID").val();
    let datatabel = ``;


    datatabel +=`
                 <table id="tabel1" class='table' style='width:100%'>                    
                                      <thead  id='thead'class ='thead'>
                                                <tr>
															<th></th>
                                                            <th>No</th>
                                                            <th>SO No</th>
                                                            <th>SO Date</th>
                                                            <th>Ship Date</th>
                                                            <th>Cust Id</th>
                                                            <th>Cust Name</th>
                                                            <th>Paket Promo</th>
                                                            <th>Amount</th>
                                                            <th>Posting</th>
                                                            <th>Delete</th>
                                                            <th>Upload</th>
                                                </tr>
                                                
                                                </thead>
                                                <tbody>
                                          
    `;
     let no =1;
    $.each(result,function(a,b){
      let status_document = b.status_document;
      let nama_document = b.nama_document;
      // $("#stdocument").val(status_document);
      // let status_gambar =0;

      datatabel +=`
                  <tr>
				   <td><i class="fa-solid fa-circle-plus text-primary fa-lg"></i></td>
                  <td>${no++}</td>
                  <td>${b.SOTransacID}</td>
                  <td>${b.sodate}</td>
                  <td>${b.shipdate}</td>
                  <td>${b.id_cust}</td>
                  <td>${b.cnama}</td>
                  <td>${b.nama_paket}</td>
                  <td>${b.rtotal}</td>`;
                    datatabel +=`<td><form role="form" action="sopostingso.php" method="POST" enctype="multipart/form-data">
                                              <input type="hidden" class="form-control"name="soTrancaid" value ="${b.SOTransacID}">
                                              <input type="hidden" class="form-control"name="cabang" value ="${b.kodecabang}">
                                              <input type="hidden" class="form-control"name="comp_kode" value ="${CompanyID}">
                                              <input type="hidden" class="form-control"name="custId" value ="${b.id_cust}">
                                              <input type="hidden" class="form-control"name="judul" value ="${b.mjudul}">
                                              <input type="hidden" class="form-control"name="user" value ="<?=$userlog?>">`;
                      if(status_document =="Y"){
                          datatabel +=`<button type="submit" id="detailpost" class="btn  btn-space"><i class="fa-solid fa-pen text-primary fa-lg"></i></button>`;
                      }else{
                        datatabel +=`<button type="submit" id="detailpost" style="display: none;"  class="btn  btn-space"><i class="fa-solid fa-pen text-primary fa-lg"></i></button>`;
 
                      }
                      datatabel +=`</form></td>`;
                      datatabel +=`<td><form role="form" action="sodelete.php" method="POST" enctype="multipart/form-data">
                                              <input type="hidden" class="form-control"name="soTrancaid" value ="${b.SOTransacID}">
                                              <input type="hidden" class="form-control"name="comp_kode" value ="${CompanyID}">
                                              <input type="hidden" class="form-control"name="cabang" value ="${b.kodecabang}">
                                              <input type="hidden" class="form-control"name="custId" value ="${b.id_cust}">
                                              <input type="hidden" class="form-control"name="judul" value ="${b.mjudul}">
                                              <input type="hidden" class="form-control"name="user" value ="<?=$userlog?>">
                                              <button type="submit" id="deleteposting" class="btn  btn-space"><i class="fa-solid fa-trash-can text-danger fa-lg"></i></button>
                      </form></td>`;

                    if(status_document == "Y"){
                      let url ="<?=base_url?>/uploads_attachfile/"+nama_document;
                      datatabel +=`<td>
                                  <a style="height:100%" href="${url}" target="_blank"><i  class="fa-solid fa-check fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span  style="height:100%; cursor:pointer" id="delete" onclick="close_attr('${nama_document}','${b.SOTransacID}');"><i class="text-danger fa-solid fa-x fa-lg"></i></span>
                                  </td>`;
                    }else{
                    
                      datatabel +=`<td>
                                  <span id="uploadDoc">
                                  <input type="hidden" class="form-control" id="SotransaId" value ="${b.SOTransacID}">
                                  <input id="attach"  type="file"multiple>
                                  <label for="attach" class="text-center"><i class="fa-solid fa-file-arrow-up fa-2x"></i></label>
                                  </span>
                                  <span id="tampilDoc">
                                  <div id="tampil_attach" class="row mt-0"></div>
                                  </span>
                                  </td>
                                  `;
                    }
                     

                  datatabel +=`</tr>`;
    });
    datatabel +=`</tbody></table>`;
    $("#tabellist").empty().html(datatabel);

  
    tabel();
  }


  function tabel(){
    //new DataTable('#tabel1');
    $("#tabel1").DataTable({
					"ordering": false,
                    "destroy":true,
                    "bAutoWidth": false,
					    dom: 'Bfrtip',
					buttons: ['colvis'],				
					 "responsive": true, 
                    "order":[[0,'desc']],      
                        pageLength: 5,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
                fixedColumns:   {
                  // left: 1,
                    right: 1
                },
                style_cell:{'fontSize':5, 'font-family':'sans-serif'},
                "order":[[0,'desc']],
        })
  }




          // untuk kirim data atter_ketabel  by wardi 2023
          function post_dataAtter(at,sotranid){
            let user ="<?=trim($userlog)?>";
            let codediv = "<?=trim($kode_cabang)?>"; 
            let formData = new FormData();
              for (var i = 0; i < at.length; i++) {
                formData.append('files[]', at[i]);
                formData.append('sotranid',sotranid);
                formData.append('cabang',codediv);

              }
             
              
              const companyID =  $("#CompanyID").find(":selected").val();
                $.ajax({
                 url:'<?=base_url?>/listposting/simpandataatten',
                  method:'POST',
                  data: formData,
                  cache: false,
                  processData: false,
                  contentType: false,
                  dataType:'json',
      
                  success:function(result){ 
                    getDataCompany(companyID)
                      
                }
            })
      
    }
//end  kirim data atter_ketabel
//untuk hapus data atter 
function close_attr(nama_file,id){
   $("#delete").css("display", "none");
   const companyID =  $("#CompanyID").find(":selected").val();
    $.ajax({
      url:'<?=base_url?>/listposting/deletedataatten',
      method :'POST',
      data : {nama_file:nama_file,id:id},
      dataType:'json',

      success:function(result){
        getDataCompany(companyID)
     
 
      } 
    });
 
  };
</script>
<?php require 'pages/footer.php'; ?>