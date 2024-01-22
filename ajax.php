<?php 
$con=new mysqli("localhost","root","","bangladesh");
$division=$con->query("SELECT * FROM division ")->fetch_all(MYSQLI_ASSOC);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-6">
        <div class="form-group" >
                <div>
                    <label>Division</label>
                </div>
                <div>
                <select id="division" >
                    <option>Select one</option>
                    <?php foreach($division as $k=>$div) { ?>
                    <option value="<?php echo $div["id"] ?>"><?php echo $div["name"] ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group" >
                <div>
                    <label>District</label>
                </div>
                <div>
                <select id="district" >
                    <option value="">Select one</option>
                </select>
                </div>
            </div>
            <div class="form-group" >
                <div>
                    <label>Thana</label>
                </div>
                <div>
                <select id="thana" >
                    <option>Select one</option>
                </select>
                </div>
            </div>
            <div id="ok"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("label").css("font-weight","bold");
    $("#division").change(function(){
        let id=$(this).val();
        
        $.ajax({
            url:"api.php",
            method:"post",
            dataType: "json",
            data:{
                dat:id
            },
            success:function(data){
                let ht=`<option value="">Select one</option>`
            data.map((d,i)=>{
                ht+=`<option value="${d.id}">${d.name}</option>`
            })
            $('#district').html(ht);
            }
        })
    })
    $('#district').change(function(){
        let district=$(this).val()
        console.log(district);
        $.ajax({
            url:"api.php",
            method:"POST",
            dataType:"json",
            data:{
                id:district
            },
            success:function(data){
                let ht=`<option value="">Select one</option>`
                data.map((d,i)=>{
                    ht+=`<option value="${d.value}">${d.name}</option>`
                    console.log(d.name);
                })
                $('#thana').html(ht);
            }
        })
    })
    $('#thana').change(function(){
        $('#ok').html("<h1>Success</h1>");
    })
})
</script>
