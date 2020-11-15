<style>
    a{color:#000;}
    a:hover{color:#339a36;}
    #users {
      font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #users td, #users th {
      border: 1px solid #bcdab3;
      padding: 8px;
    }

    #users tr:nth-child(even){background-color: #f2f2f2;}

    #users tr:hover {background-color: #bcdab3;}

    #users th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #249228;
      color: white;
    }
    #details {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      max-width:500px!important;
    }

#details td, #details th {
  border: 1px solid #bcdab3;
  padding: 8px;
}

#details tr:nth-child(even){background-color: #f2f2f2;}

#details tr:hover {background-color: #bcdab3;}

#details th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #249228;
  color: white;
}

#spinner:not([hidden]) {
  position: fixed;
  top: 25%;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

#spinner::after {
  content: "";
  width: 80px;
  height: 80px;
  border: 2px solid #f3f3f3;
  border-top: 3px solid #2d5f1e;
  border-radius: 100%;
  will-change: transform;
  animation: spin 1s infinite linear
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

    </style>

<table border="1" id="users">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>UserName</th>
            <th>Email</th>
        </tr>
        </thead>    
        <tbody>
        <?php
        foreach($data as $obj){
        ?>
        <tr>
			<td><?php echo '<a href="#" onclick="return theApiRequest(' . $obj->id  .');">' . $obj->id ?> </a> </td> 
			<td><?php echo '<a href="#" onclick="return theApiRequest(' . $obj->id  .');">' . $obj->name ?> </a> </td> 
			<td><?php echo '<a href="#" onclick="return theApiRequest(' . $obj->id  .');">' . $obj->username ?> </a> </td> 
			<td><?php echo '<a href="#" onclick="return theApiRequest(' . $obj->id  .');">' . $obj->email ?> </a> </td> 
        </tr>
        <?php   
        }
        ?>
        </tbody>
        </table>
        <div hidden id="spinner"></div>
         <table id="details">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>username</th>
                        <th>email</th>
                        <th>address.street</th>
                        <th>address.suite</th>
                        <th>address.city</th>
                        <th>address.zipcode</th>
                        <th>address.geo.lat</th>
                        <th>address.geo.lng</th>
                        <th>phone</th>
                        <th>website</th>
                        <th>company.name</th>
                    </tr>
                </thead>
                <tbody id="content">
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
 <script>
            document.getElementById("details").style.display = "none";
            var content = document.getElementById('content');
            const spinner = document.getElementById("spinner");

            function theApiRequest (param) {

                spinner.removeAttribute('hidden');
                var url = 'https://jsonplaceholder.typicode.com/users/'+param;
                var data = {username: 'courseya'};
                fetch(url, {cache: "force-cache"},{
                method: 'GET', 
                headers:{
                    'Content-Type': 'application/json'
                }
                }).then(res => res.json())
                .then( data => {
                    spinner.setAttribute('hidden', '');
                    tabla(data)
                })   
                ;               
            }

            function tabla(data){

                var dataJson = JSON.stringify(data);
                var x = document.getElementById("details");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                x.style.display = "block";
                }

                for(let valor of dataJson){
                    content.innerHTML = '';
                    content.innerHTML = `
                    <tr>
                        <td>${JSON.stringify(data.id)}</td>
                        <td>${JSON.stringify(data.name)}</td>
                        <td>${JSON.stringify(data.username)}</td>
                        <td>${JSON.stringify(data.email)}</td>
                        <td>${JSON.stringify(data.address.street)}</td>
                        <td>${JSON.stringify(data.address.suite)}</td>
                        <td>${JSON.stringify(data.address.city)}</td>
                        <td>${JSON.stringify(data.address.zipcode)}</td>
                        <td>${JSON.stringify(data.address.geo.lat)}</td>
                        <td>${JSON.stringify(data.address.geo.lng)}</td>
                        <td>${JSON.stringify(data.phone)}</td>
                        <td>${JSON.stringify(data.website)}</td>
                        <td>${JSON.stringify(data.company.name)}</td>
                   </tr>
                `
                }
        }
        </script>       