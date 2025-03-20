

document.addEventListener('DOMContentLoaded', async () => {
    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');
    if (!id) window.location.href = '../index.php';
    getProductsbyId(id);
    updateProducts(id);



});



updateProducts = async (id,data) => {

    document.getElementById('productForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const updatedData = {
            reference: document.getElementById('reference').value,
            description: document.getElementById('description').value,
            priceTaxIncl: document.getElementById('priceTaxIncl').value,
            priceTaxExcl: document.getElementById('priceTaxExcl').value,
            idLang: document.getElementById('idLang').value,
            quantity: document.getElementById('quantity').value
        };
        try {
            const response = await fetch(`http://localhost:3000/api.php?id=${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(updatedData)
            })

            if (!response.ok) {
                throw new Error('Erreur lors de la mise à jour du produit');
            }

            window.location.href = "../index.php";
        } catch (error) {
            console.log(error);

        }

    });


}



async function getProductsbyId(id) {
    try {
        const response = await fetch(`http://localhost:3000/api.php?id=${id}`, );
        if (!response.ok) {
            throw new Error('Erreur lors du chargement du produit');
        }
        const product = await response.json();
        document.getElementById('productId').value = product.id;
        document.getElementById('reference').value = product.reference;
        document.getElementById('description').value = product.description;
        document.getElementById('priceTaxIncl').value = product.priceTaxIncl;
        document.getElementById('priceTaxExcl').value = product.priceTaxExcl;
        document.getElementById('idLang').value = product.idLang;
        document.getElementById('quantity').value = product.quantity;

    } catch (error) {
        console.error(error);
    }
}