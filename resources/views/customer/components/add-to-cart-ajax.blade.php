<script>
    function add_to_cart(pid){
        fetch(`/add_to_cart/${pid}`, {
            method: 'get',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                },
            })
            .then((data) => {
                return data.json()
            })
            .then((data) => {
                toastr.options = {
                    "closeButton" : true,
  	                "progressBar" : true
                }
                if(!data.status){
                    toastr.warning("Something went wrong")
                }
                else if(data.status){
                    toastr.success("Item added to cart")
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    }
</script>
