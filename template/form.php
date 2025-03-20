<div class="card mb-4">
    <div class="card-header">
        Ajouter / Modifier un Produit
    </div>
    <div class="card-body">
        <form id="productForm">
            <input type="hidden" id="productId" value="">
            <div class="form-group">
                <label for="reference">Référence</label>
                <input type="text" class="form-control" name="reference" id="reference" placeholder="Référence" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
            </div>
            <div class="form-group">
                <label for="priceTaxIncl">Prix TTC</label>
                <input type="number" step="0.01" class="form-control" name="priceTaxIncl" id="priceTaxIncl" placeholder="Prix TTC" required>
            </div>
            <div class="form-group">
                <label for="priceTaxExcl">Prix HT</label>
                <input type="number" step="0.01" class="form-control" name="priceTaxExcl" id="priceTaxExcl" placeholder="Prix HT" required>
            </div>
            <div class="form-group">
                <label for="idLang">Langue</label>
                <select name="idLang" class="form-control" id="idLang" required>
                    <option value="1">Français</option>
                    <option value="2">Anglais</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantité" required>
            </div>
            <button type="submit" class="btn btn-primary" id="submitBtn">Enregistrer</button>
            <button type="reset" class="btn btn-secondary" id="cancelBtn">Annuler</button>
        </form>
    </div>
</div>