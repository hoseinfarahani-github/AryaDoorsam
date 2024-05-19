function selectClient(event){
    var clientId =event.target.value

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })
    $.ajax({
        type : 'POST',
        url : '/client/get_info/',
        data : JSON.stringify({
            id : clientId ,
            _method : 'post'
        }),
        success : function(res) {
        console.log(res.address)
        console.log(res.address)
            document.getElementById('clientName').value=res.information.name
            document.getElementById('client_id').value=res.information.client_id
            document.getElementById('clientType').value=res.information.type
            document.getElementById('province').value=res.address.province
            document.getElementById('county').value=res.address.county
            document.getElementById('postalCode').value=res.address.postalCode
            document.getElementById('phone').value=res.address.phone
            document.getElementById('address_detail').innerText=null
            document.getElementById('address_detail').innerText=res.address.detail
        }
    })

}
/*document.getElementById("color").addEventListener("change",function (event){
});*/

function selectAttribute(event){
    console.log(event.target)
    var id= event.target.getAttribute('data-id')
    var attribute= event.target.getAttribute('data-attribute')
    var value=event.target.value
    console.log(document.getElementById('div-image-'+id).firstElementChild.getAttribute('data-name'))
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })


    //
    $.ajax({
        type : 'POST',
        url : '../../product/change/photo',
        data : JSON.stringify({
            product_id : id ,
            product_value :value,
            product_attribute :attribute,
            image_name: document.getElementById('div-image-'+id).firstElementChild.getAttribute('data-name'),
            _method : 'post'
        }),
        success : function(res) {
            console.log(document.getElementById('div-image-'+id))
            document.getElementById('image'+id).src=res.path
            document.getElementById('image'+id).setAttribute('data-name',res.image_name)
        }
    });
}
