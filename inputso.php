
<?php require 'pages/header.php'; ?>
<body>
<?php
 
 
 $bambi = (isset($_POST["bambi"]))? $_POST["bambi"] : '';
 $bindex =(isset($_POST["bindex"]))? $_POST["bindex"] : '';
 $benex = (isset($_POST["benex"]))? $_POST["benex"] : '';

 $dataarray =[
    $bambi,$bindex,$benex

 ];

 $idkategori ="";
 foreach($dataarray as $item){    
    if($item !==""){
        $idkategori =$item;
    }
   // if($item['bambi'] !=="")

 }

 $user_log ="wardi";
?>


<form id="Adddata" class="row g-3 mt-4">
    <input type="hidden" id="email" value="<?=$user_log?>">
    <input type="hidden" id="kategori" value="<?=$idkategori?>">
    <div class="col-md-6">
    <div class="mb-3 row">
        <input type="hidden" id="isi" value="">
        <input type="hidden" id="disc" value="">
        <input type="hidden" id="satuan" value="">
        <input type="hidden" id="harga_asli" value="">
        <label for="Partname" class="col-sm-2 col-form-label">PartId- PartName</label>
        <div class="col-sm-6">
                <select class="form-select" id="Partname" aria-label="Default select ">
                  <option selected>Please Select</option>
               
                </select>
              </div>
    </div>
    <div class="mb-3 row">
        <label for="warna" class="col-sm-2 col-form-label">Warna</label>
        <div class="col-sm-6">
                <select class="form-select" id="warna" aria-label="Default select ">
                  <option selected>Please Select</option>
               
                </select>
              </div>
    </div>
    <div class="mb-3 row">
        <label for="qty" class="col-sm-2 col-form-label">Qty</label>
        <div class="col-sm-10">
         <button class="btn btn-primary" id="kurang">-</button>
            <input disabled type="number" value="0" class="form-control" id="qty">
         <button class="btn btn-primary" id="tambah">+</button>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
        <input disabled type="number" class="form-control" id="harga">
        </div>
    </div>
            <div class="row col-sm-6 md-5">
                  <div class="col-sm-2">
                    <button type="submit"  id="Adddata" class="btn btn-primary">Add</button>
                  </div>
              
            </div>
</form>
    <div id="datatempt"></div>

    <div class="col-md-12 text-start mt-4">
        <div class="col-md-8 row">
            <div  class="col-sm-4 md-3"><button id="totalhargalist" class="btn btn-warning">Total :</button></div>
            <div class="col-sm-4">
                  <form method="POST" action="comprimasi.php">
                   
                    <input type="hidden" id="email_ListSo" name="emaillist" value="">
                     <input type="hidden" id="totalharga" name="totalharga" value="">
                    <button type="submit" class="btn btn-primary">Sumbit</button>
                  </form>      
                
            </div>
        </div>
    </div>
<!-- <div class="child-content" id="Listso"><div>
                <h2>ListSO</h2>
                <hr>
                <table class="table">
                    <thead id="thead-dark">
                        <tr>
                            <th>Patid-Partname</th>
                            <th>Warna</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Actiion</th>
                        </tr>
                    </thead>
                    <tbody id="detailListso">

                    </tbody>
                </table>
            </div>
</div> -->

<script>
    $(document).ready(function(){

       const kategori = $("#kategori").val();
        get_Patname(kategori);
        renderTemptList();

        // get color 
            $("#Partname").on("change",function(){
                const partid = $(this).val();
                const kategori = $("#kategori").val();
                //let getpartname = namaPataname(partid);
                datas ={
                    'spartid':partid,
                     'kategory':kategori
                }
               get_color(datas);
            })
        //and

        $("#kurang").on("click",function(e){
            e.preventDefault();
                let  q= $("#qty").val();
              let  qty =parseFloat(q);
                let jml;
            if(qty !==0){
                jml =qty-1;
             }else{
                jml =0;
             }
             $("#qty").val(jml);
        });

        $("#tambah").on("click",function(e){
            e.preventDefault();
            const  q= $("#qty").val();
            let  qty =parseFloat(q);
                let jml =qty+1;
           
             $("#qty").val(jml);
        });

        // untuk simpan data ke tabel tamp
        const submitAdd = document.getElementById("Adddata");
        submitAdd.addEventListener("submit", function(event){
                event.preventDefault();
                tambahDataso();
            });
            //renderTemptList();

      
    })//batas document ready

    // function namaPataname(partid){
    //     console.log(partid);
    //     $.ajax({
    //     url:'http://localhost/portalresitapi/public/shadowpart/getnamapartname',
    //      method:"POST",
    //      data:{partid:partid},
    //      dataType: "json",
    //      success:function(result){
    //      }

    //     });
    // }


    function get_Patname(kategori){
     
     $.ajax({
     url:'http://localhost/portalresitapi/public/shadowpart/getpatname',
         method:"POST",
         data:{kategory:kategori},
         dataType: "json",
         success:function(result){
             $.each(result,function(key,value){
           
                     data ={
                         'id' : value.partid,
                         'text':value.partname,
                         'value':value.partid
                     }
                    
                     $("#Partname").append($('<option>',data));   
             });
             
             
            
         }
     })
     }

     //untuk get color

     function get_color(datas){
         $.ajax({
             url:'http://localhost/portalresitapi/public/shadowpart/getcolor',
                 method:"POST",
                 data:datas,
                 dataType: "json",
                 success:function(result){
                
                     let harga ="";
                     let isi ="";
                     let satuan="";
                     let disc ="";
                     let harga_s ="";
                     $.each(result,function(key,value){
                      
                        isi = value.isi;
                        satuan = value.satuan;
                        disc = value.disc;
                        harga_s =value.unitprice;
                        harga = value.harga;
                             data ={
                                 'id' : value.colorid,
                                 'text':value.colorname,
                                 'value':value.colorid
                             }
                         
                             $("#warna").append($('<option>',data));   
                     });
                     
                     $("#isi").val(isi);
                     $("#disc").val(disc);
                     $("#satuan").val(satuan);
                     $("#harga").val(harga);

                     $("#harga_asli").val(harga_s);

                 }
             })
     }
     //and 

    


    function tambahDataso(){
        const email = document.getElementById("email").value;
        const partid = document.getElementById("Partname").value;
        const isi = document.getElementById("isi").value;
        const satuan = document.getElementById("satuan").value;
        const disc = document.getElementById("disc").value;
        const qty = document.getElementById("qty").value;
        const harga = document.getElementById("harga").value;
        const sel = document.getElementById("Partname");
        const harga_asli = document.getElementById("harga_asli").value;

        let p = sel.options[sel.selectedIndex].text;
        let splitdata = p.split("|");
        const partname = splitdata[1];
         Savedatatemp(email,partid,qty,harga,partname,isi,satuan,disc,harga_asli);
        }

      function  Savedatatemp(email,partid,qty,harga,partname,isi,satuan,disc,harga_asli){
          let q =parseFloat(qty); 
         if(q == 0){
            alert("Maaf Qty tidak boleh kosong");
         }else{
            const datas = {
                'email':email,
                'partid':partid,
                'qty':parseFloat(qty),
                'harga':parseFloat(harga),
                'partname':partname,
                'isi':parseInt(isi),
                'satuan':satuan,
                'harga_asli':parseFloat(harga_asli),
                'disc':parseFloat(disc)

            };
           
        $.ajax({
            url:'http://localhost/portalresitapi/public/shadowpart/savedatatempt',
            method:"POST",
            data:datas,
            dataType: "json",
            success:function(result){
                renderTemptList();
            }

        });
        }
      }
    

      function  renderTemptList(){
        const email = document.getElementById("email").value;
        $.ajax({
            url:'http://localhost/portalresitapi/public/shadowpart/tampiltampt',
            method:"POST",
            data:{email:email},
            dataType: "json",
            success:function(result){
                let tabel =`
                    <h2 class="text-center">ListSO</h2>
                `;
                tabel +=`
                    <table id="tabeldetail" class="table">
                        <thead id="thead-dark">
                            <tr>
                                <th>Patid</th>
                                <th>Partname</th>
                                <th>Satuan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th style = "display:none" ></th>
                                <th>Actiion</th>
                            </tr>
                        </thead>
                        <tbody>
                    `;
                $.each(result,function(key,value){
                    tabel +=` <tr>
                                            <td>${value.partid}</td>
                                            <td>${value.partname}</td>
                                            <td>${value.satuan}</td>
                                            <td>${value.qty}</td>
                                            <td class="harga-value">${value.harga}</td>
                                            <td id="email-value" style = "display:none">${value.email}</td>
                                            <td><button type="buttton" class="btn btn-danger" id="deletedata" data-code="${value.code}"data-email="${value.email}">Delete</button></td>
                              </tr>
                            `;
                });
                tabel +=`</tbody></table>`;
            $("#datatempt").empty().html(tabel);
            setTotalharga();
            }

        });

      }

        //untuk delete  list so
        $(document).on("click","#deletedata",function(e){
            e.preventDefault();
                let code = $(this).data('code');
                let email = $(this).data('email');

                datas={
                    code:code,
                    email:email
                }
                $.ajax({
                url:'http://localhost/portalresitapi/public/shadowpart/deletetempt',
                method:"POST",
                type:"DELETE",
                data:datas,
                dataType: "json",
                    success:function(result){
                        renderTemptList();
                    }
                });
            });
        //and 


        // untuk total harga
            function setTotalharga(){
                var total = 0;
                $(".harga-value").each(function() {
                var value = parseInt($(this).text()); // Mengambil nilai dari elemen dan mengubahnya menjadi angka (integer)
                total += value; // Menambahkan nilai ke total
               
                });
                let t = 'Total: '+total;
                $("#totalhargalist").empty().html(t);
                $("#totalharga").val(total);
                let id =  $("#email-value").text();
                $("#email_ListSo").val(id);
            }

        //and 

        // untuk simpan solist ke orderHead dan order detail
        //   $(document).on("click","#CrateateData",function(e){
        //     e.preventDefault();
          
            
        //      id =  $("#email-value").text();
        
        //         $.ajax({
        //         url:'http://localhost/portalresitapi/public/shadowpart/simpanso',
        //         method:"POST",
        //         data:{email:id},
        //         dataType: "json",
        //         success:function(result){


        //             }
        //         });
            
        //   });  

        //and
        function generateId() {
                return +new Date();
        }
        
    

</script>
<?php require 'pages/footer.php'; ?>