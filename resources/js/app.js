import './bootstrap';

document.getElementById('type').addEventListener('change', function() {
    var selectedType = this.value;
    var categorySelect = document.getElementById('category');

    // Reset options
    categorySelect.innerHTML = '';

    if (selectedType === 'income') {
        // Add income categories
        var incomeCategories = ['wage', 'bonus', 'gift'];
        incomeCategories.forEach(function(category) {
            var option = document.createElement('option');
            option.value = category;
            option.text = category;
            categorySelect.appendChild(option);
        });
    } else if (selectedType === 'expense') {
        // Add expense categories
        var expenseCategories = ['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation'];
        expenseCategories.forEach(function(category) {
            var option = document.createElement('option');
            option.value = category;
            option.text = category;
            categorySelect.appendChild(option);
        });
    } else {
        // Default option (e.g., 'uncategorized')
        var option = document.createElement('option');
        option.value = 'uncategorized';
        option.text = 'Uncategorized';
        categorySelect.appendChild(option);
    }
});

