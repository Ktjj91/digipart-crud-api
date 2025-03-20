const table = document.getElementById('products');
const fetchProducts = async () => {
    try {
        const response = await fetch('http://localhost:3000/api.php');
        table.innerHTML = '';
        const products = await response.json();
        products.forEach(product => {
            table.innerHTML+= `
            <tr>
            <td>${product.id}</td>
            <td>${product.reference}</td>
            <td>${product.description}</td>
            <td>${product.priceTaxIncl}</td>
            <td>${product.priceTaxExcl}</td>
            <td>${product.langue || ''}</td>
            <td>${product.quantity}</td>
            <td>
             <a class="btn btn-primary" href="./template/edit.php?id=${product.id}">Editer</a>
              <a  onclick="deleteProduct(${product.id})"  class="btn btn-danger">Suprimmer</a>
            
            </td>
                        
            </tr>`;
        })

        return products;
    } catch (e) {
        console.error(e);
    }
}

const deleteProduct = async (id) => {
    if(confirm("Voulez vous supprimer le produit")){
        try{
            const response = await fetch(`http://localhost:3000/api.php?id=${id}`,{
                method: 'DELETE',
            });
            fetchProducts();

        } catch (e){
            console.error(e);
        }
    }

}

fetchProducts();