<?php require 'pages/header.php'; ?>
<style>
      input[type="file"]{
        display: none;
    }
  </style>
<body>

<!-- <h5 class="text-star"> TEMPO ANYAR SO</h5> -->

<?php 
$comp = [
 // "All"=>"dummy",
 "DKI"=> "bambi-mg2",
 "JBR"=> "bambi04",
 //"JTM"=> "SB",
 //"JTG"=> "NS2",
 //"SMT"=> "NS1",
 //"KLM"=> "NS4",
 //"SLW"=> "NS3",
 //"DGM"=> "DGM",
];


$userlog =$mar;

$varcabang = (isset($_GET["varcabang"]))? $_GET["varcabang"] : '';

?>
 <main role="main" class="container">
  
<!-- BATAS FORM -->

    <div id="itemTabel"></div>

  </main>                                   

      

<script>
  $(document).ready(function(){

   
    let user ="<?=trim($userlog)?>";
	let codediv = "<?=trim($kode_cabang)?>"; 
   
	 const  companyID ={
			'code_div':codediv,
			'userlog':user
	 }
	 //console.log(companyID);
	 getDataCompany(companyID);
 


   $(document).on("change","#attach",function(){ 
              
            let at = $('#attach').prop('files');
            let  sotranid = $("#SotransaId").val();
            // console.log(sotranid);
            // let kode_budget = $('#kode_tranksi').val();
            // let id_appen ="#tampil_attach";
            // let atter = "KN";
            post_dataAtter(at,sotranid);
        });

  })




  function getDataCompany(companyID){
    $.ajax({
                url:"<?=base_url?>/listposting/getlistso",
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
                    datatabel +=`<td><form role="form" action="postingso.php" method="POST" enctype="multipart/form-data">
                                              <input type="hidden" class="form-control"name="soTrancaid" value ="${b.SOTransacID}">
                                              <input type="hidden" class="form-control"name="cabang" value ="${b.kodecabang}">
                                              <input type="hidden" class="form-control"name="custId" value ="${b.id_cust}">
                                              <input type="hidden" class="form-control"name="judul" value ="${b.mjudul}">
                                              <input type="hidden" class="form-control"name="user" value ="<?=$userlog?>">`;
                      if(status_document =="Y"){
                          datatabel +=`<button type="submit" id="detailpost" class="btn  btn-space"><i class="fa-solid fa-pen text-primary fa-lg"></i></button>`;
                      }else{
                        datatabel +=`<button type="submit" id="detailpost" style="display: none;"  class="btn  btn-space"><i class="fa-solid fa-pen text-primary fa-lg"></i></button>`;
 
                      }
                      datatabel +=`</form></td>`;
                      datatabel +=`<td><form role="form" action="delete.php" method="POST" enctype="multipart/form-data">
                                              <input type="hidden" class="form-control"name="soTrancaid" value ="${b.SOTransacID}">
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
            
              
              const  companyID ={
                  'code_div':codediv,
                  'userlog':user
              }
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
  let user ="<?=trim($userlog)?>";
	let codediv = "<?=trim($kode_cabang)?>"; 
   
	 const  companyID ={
			'code_div':codediv,
			'userlog':user
	 }
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