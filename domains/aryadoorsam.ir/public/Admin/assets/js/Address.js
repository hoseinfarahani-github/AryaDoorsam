
    function firstProvinceSelect(){
    proId = document.getElementById('provinceSelected').value;
    proName = document.getElementById('myInputProvinceRequest').value;
    couName = document.getElementById('myInputCountyRequest').value;
    selectProvince(proId,proName);
    document.getElementById('dropbtnCounty').innerHTML = couName;
    console.log(proId,proName);
}
    $(document).on('show.bs.modal', '#editAddress', function (e) {

    // selectProvince()
});
    $(document).on("click", function(event){
    var $trigger = $(".dropdownAddress");
    if($trigger !== event.target && !$trigger.has(event.target).length){
    $(".dropdown-content-address").removeClass("showProvince");
    $(".dropdown-content-address").removeClass("showCounty");
}
});
    document.getElementById('fq-address').style.display = "none";
    document.getElementById('newAddressH3').classList.remove("active");
    function changeAddress() {
    if (document.getElementById('newAddressH3').classList[1] == 'active') {
    // $('#NewAddress').check()
    console.log('hi');
    document.getElementById('newAddress').checked = 'true';
}
    else {
    document.getElementById('newAddress').checked = 'false';

}
}

    // function closeNewAddress(){
    //     document.getElementById('fq-address').style.display = "none";
    //     document.getElementById('newAddressH3').classList.remove("active");
    // }

    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function showProvince() {
    document.getElementById("myDropdownProvince").classList.toggle("showProvince");

}
    function showCounty() {
    document.getElementById("myDropdownCounty").classList.toggle("showCounty");

}
    function selectProvince(){

        var provinceId = document.getElementById("province").value;
        /*document.getElementById('dropbtnProvince').innerHTML = name;
        document.getElementById('myInputProvince').setAttribute('value',name);
        document.getElementById('myInputProvinceRequest').setAttribute('value',name);
        document.getElementById("myDropdownProvince").classList.toggle("showProvince");
        document.getElementById('dropbtnCounty').innerHTML = "انتخاب شهر";
        document.getElementById('myInputCounty').setAttribute('value','');*/

    $.ajaxSetup({
    headers : {
    'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
    'Content-Type' : 'application/json'
}
})

    $.ajax({
    type : 'POST',
    url : '/address/getProvince_setCity',
    data : JSON.stringify({
    provinceId : provinceId ,
    _method : 'post'
}),
    success : function(res) {

        document.getElementById('city').removeAttribute('disabled');
        city=document.getElementById('city');
        if (city.firstElementChild.value != 0){
            city.firstElementChild.value=0;
            city.firstElementChild.innerHTML='انتخاب شهر ...'
            city.firstElementChild.label='انتخاب شهر...'
        }
        if(city.children.length >1){

            city.firstElementChild.removeAttribute('disabled','disabled');
            city.firstElementChild.setAttribute('selected','selected');

            var length=city.children.length;
            for (var z=0; z < length ;z++){
                if( city.lastElementChild.value != 0){
                    city.lastElementChild.remove();
                }
            }
        }

        for(var i=0;i< res.cities.length;i++)
        {
            var option=document.createElement('option');
            option.value=res.cities[i].id;
            option.label=res.cities[i].title;
            option.innerHTML=res.cities[i].title;
            option
            city.appendChild(option);
        }
        city.firstElementChild.setAttribute('disabled','disabled');

}
});
}

    function addCounty(item){

    var counties = '<span onclick="selectCounty(\''+item.id+'\',\''+item.name+'\')" id="'+item.id+'">'+item.name+'</span>';
    document.getElementById('countiesList').innerHTML += counties;
}
    function selectCounty(id,name){
    document.getElementById('dropbtnCounty').innerHTML = name;
    document.getElementById('myInputCounty').setAttribute('value',name);
    document.getElementById('myInputCountyRequest').setAttribute('value',name);
    document.getElementById("myDropdownCounty").classList.toggle("showCounty");
}
    function filterFunctionProvince() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInputProvince");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdownProvince");
    a = div.getElementsByTagName("span");
    for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
    a[i].style.display = "";
} else {
    a[i].style.display = "none";
}
}
}
    function filterFunctionCounty() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInputCounty");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdownCounty");
    a = div.getElementsByTagName("span");
    for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
    a[i].style.display = "";
} else {
    a[i].style.display = "none";
}
}
}

    function changeAddressValues(){
    document.getElementById('provinceCountyOrder').innerHTML =
    document.getElementById('myInputProvinceRequest').value + ' / ' +
    document.getElementById('myInputCountyRequest').value;
    document.getElementById('postalCodeOrder').innerHTML = 'کد پستی : '+
    document.getElementById('postalCode').value ;
    document.getElementById('addressDescriptionOrder').innerHTML =
    document.getElementById('detail').value ;
}
