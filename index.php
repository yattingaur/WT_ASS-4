<!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 4</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/solar/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/bed73fd364.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div class="container mt-4">
    <h1 class="display-4 text-center">
        <i class="fas fa-glass-martini-alt text-primary"></i>
        MY<span class="text-success"> RESTAURANT</span></h1>

</div>
<div class="jumbotron bg-success text-center"><h2 style="color: white;">Restaurant Menu</h2></div>
       
    
    
    <div class="container">
      <select name="item restaurant-dropdown restaurant" class="custom-select custom-select-lg mb-3" id="restaurant">
        <option value="">Select Menu</option>
    </select>
    <br>

    <table id="table" class="table table-striped table-success">    
      <tr>
        <th>Name</th>
        <td id="menuname"></td>
      </tr>
      <tr>
        <th>ID</th>
        <td id="id"></td>
      </tr>
      <tr>
        <th>Short Name</th>
        <td id="sname"></td>
      </tr>
      <tr>
        <th>Description</th>
        <td id="descp"></td>
      </tr>
      <tr>
        <th>Price Small</th>
        <td id="psmall"></td>
      </tr>
      <tr>
        <th>Price Large</th>
        <td id="plarge"></td>
      </tr>
      <tr>
        <th>Small Portion Name</th>
        <td id="spname"></td>
      </tr>
      <tr>
        <th>Large Portion Name</th>
        <td id="lpname"></td>
      </tr>
      </table>
        
      
      </div>
          
        
       
        
            
        <script src="jquery-3.5.1.min.js"></script>
        <script>
        let base_url = "http://localhost/WT/describe.php";

        $("document").ready(function(){
            getRestaurantMenuList();
            document.querySelector("#restaurant").addEventListener("change",getMenuItemList);
        });

        function getRestaurantMenuList() {
            let url = base_url + "?req=menu_name_list";
            $.get(url,function(data,success){
                for (const key in data) {
                let opt = document.createElement("option");
                opt.textContent = data[key].name;
                opt.value = data[key].name; 
                document.querySelector('#restaurant').appendChild(opt);
            }
            });
        }

        
            function getMenuItemList(i)
            {
                
                let index=i.target.value;
                
                console.log(index);
                let url=base_url + "?req=menuName&name="+index;
                $.get(url,function(data,success){
                    
                        
                        if(data != null){
                        let x = data;
                        let pricesmall = x.price_small;
                        
                        if(pricesmall == null){
                            pricesmall = "Not available";
                        }
                        let descrp = x.description;
                        if(descrp == ""){
                            descrp = "Description not available";
                        }
                        let smallpname = x.small_portion_name;
                        if(smallpname == null)
                        {
                            smallpname = "Not Available";
                        }
                        let largepname = x.large_portion_name;
                        if(largepname == null)
                        {
                            largepname = "Not Available";
                        }
                        document.querySelector("#menuname").textContent = x.name;
                        document.querySelector("#id").textContent = x.id;
                        document.querySelector("#sname").textContent = x.short_name;
                        document.querySelector("#descp").textContent = descrp;
                        document.querySelector("#psmall").textContent = pricesmall;
                        document.querySelector("#plarge").textContent = x.price_large;
                        document.querySelector("#spname").textContent = smallpname;
                        document.querySelector("#lpname").textContent = largepname;
                    }
                    document.getElementById("table").style.display = "block";
                });
                
            }
        
      
    </script>


        
    </body>
</html>
