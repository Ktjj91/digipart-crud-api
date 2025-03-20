const form = document.getElementById('productForm');
const createProduct =  () => {
    form.addEventListener('submit', async (e) => {
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
            const response = await fetch("http://localhost:3000/api.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(updatedData)
            })
            if (!response.ok) {
                throw new Error(`${response.status} ${response.statusText}`);
            }
        } catch (error) {
            console.log(error)
        }
        window.location.href ='../index.php';

    })
}

createProduct();