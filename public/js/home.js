window.onload = (event) => {
    getUsers();
};

async function modalUser(type, id, json){
    console.log(type);

    if (type == 1) {
        document.getElementById('modalTitle').innerText = 'Create User'
        document.getElementById('btnModalSuccess').innerHTML = '<button type="button" class="btn btn-primary" onclick="createUser()" id="btnModalUserSuccess">Create User</button>';
    }
    else{
        document.getElementById('modalTitle').innerText = 'Edit User'
        document.getElementById('userId').value = id;
        document.getElementById('inputFirtName').value = json['first_name']
        document.getElementById('inputLastName').value = json['last_name']
        document.getElementById('inputAddress').value = json['address']
        document.getElementById('btnModalSuccess').innerHTML = '<button type="button" class="btn btn-primary" onclick="editUser()" id="btnModalUserSuccess">Edit User</button>';
        
    }

    $('#modalUser').modal('show')
}

async function createUser(){
    let inputFirtName = document.getElementById('inputFirtName').value
    let inputLastName = document.getElementById('inputLastName').value
    let inputAddress = document.getElementById('inputAddress').value

    if (inputFirtName == '' || inputFirtName == null || inputFirtName == 0) {
        console.log('Add Firt Name');
        return false;
    }
    if (inputLastName == '' || inputLastName == null || inputLastName == 0) {
        console.log('Add Last Name');
        return false;
    }
    if (inputAddress == '' || inputAddress == null || inputAddress == 0) {
        console.log('Add Address');
        return false;
    }

    let data =  {
        'firtName' : inputFirtName,
        'lastName' : inputLastName,
        'address' : inputAddress,
    }

    let options = {
        "method": 'POST',
        "headers": {
            "Content-Type": "application/json",
            "accept": "application/json",
        },
        "body": JSON.stringify(data)
    };

    let url = base_url +'index.php/createUsers';
    console.log(url)

    try {
        let res = await fetch(url, options);
        let response = await res.json();
        console.log(response)
        getUsers();
        $('#modalUser').modal('hide')
        alert(response.message)
    } catch (e) {
        console.log(e);
    }


}

async function getUsers(){
    let options = {
        "method": 'GET',
        "headers": {
            "Content-Type": "application/json",
            "accept": "application/json",
        }
    };    

    let url = base_url +'index.php/getUsers';

    try {
        let res = await fetch(url, options);
        let response = await res.json();

        let data = response['data'];
        console.log(data)

        html = '';
        for (let i = 0; i < data.length; i++) {
            const user = data[i];

            html += "<tr>\
                        <th scope='row'>"+user['id']+"</th>\
                        <td>"+user['first_name']+"</td>\
                        <td>"+user['last_name']+"</td>\
                        <td>"+user['address']+"</td>\
                        <td>\
                            <button type='button' class='btn btn-success btn-sm' onclick='modalUser(2, "+user['id']+", " + JSON.stringify(user) + " )'>Edit</button>\
                            <button type='button' class='btn btn-danger btn-sm' onclick='deleteUser("+user['id']+")'>Delete</button>\
                        </td>\
                    </tr>";
        }

        document.getElementById('dataTable').innerHTML = html;
       
    } catch (e) {
        console.log(e);
        return false;
    }
}



async function editUser(){
    let inputFirtName = document.getElementById('inputFirtName').value
    let inputLastName = document.getElementById('inputLastName').value
    let inputAddress = document.getElementById('inputAddress').value
    let id = document.getElementById('userId').value;

    if (inputFirtName == '' || inputFirtName == null || inputFirtName == 0) {
        console.log('Add Firt Name');
        return false;
    }
    if (inputLastName == '' || inputLastName == null || inputLastName == 0) {
        console.log('Add Last Name');
        return false;
    }
    if (inputAddress == '' || inputAddress == null || inputAddress == 0) {
        console.log('Add Address');
        return false;
    }


    let data =  {
        'id' : id,
        'firtName' : inputFirtName,
        'lastName' : inputLastName,
        'address' : inputAddress,
    }

    let options = {
        "method": 'POST',
        "headers": {
            "Content-Type": "application/json",
            "accept": "application/json",
        },
        "body": JSON.stringify(data)
    };

    let url = base_url +'index.php/editUsers';
    console.log(url)

    try {
        let res = await fetch(url, options);
        let response = await res.json();
        console.log(response)
        getUsers();
        $('#modalUser').modal('hide')
        alert(response.message)
    } catch (e) {
        console.log(e);
    }

}



async function deleteUser(id){
    let data =  {
        'id' : id
    }

    let options = {
        "method": 'POST',
        "headers": {
            "Content-Type": "application/json",
            "accept": "application/json",
        },
        "body": JSON.stringify(data)
    };

    let url = base_url +'index.php/deleteUser';

    try {
        let res = await fetch(url, options);
        let response = await res.json();
        console.log(response)
        getUsers();
        alert(response.message)
    } catch (e) {
        console.log(e);
    }
}