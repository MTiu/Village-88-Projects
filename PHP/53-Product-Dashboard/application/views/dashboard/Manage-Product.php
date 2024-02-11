
    <main class="dashboard">
        <section>
            <h1>Add a new Product</h1>
            <a href="<?= base_url('Dashboard')?>">Return to Dashboard</a>
        </section>
        <section>
            <form>
                <label>
                    Name:
                    <input type="text" name="product-name">
                </label>
                <label>
                    Image URL:
                    <input type="text" name="product-image">
                </label>
                <label>
                    Description:
                    <textarea name="product-description"></textarea>
                </label>
                <label>
                    Price:
                    <input type="text" name="product-price">
                </label>
                <label>
                    Inventory Count:
                    <input type="number" name="inventory-count" value="1" min max>
                </label>
            </form>
        </section>
    </main>
</body>
</html>