<!DOCTYPE html>
<html>
<head>
    <title>Search Engine</title>
</head>
<body>
    <h1>Search Data</h1>
    <form id="searchForm">
        <select id="country" name="country">
            <option value="">Select Country</option>
            <option value="Ghana">Ghana</option>
            <!-- Add other countries as needed -->
        </select>
        <select id="state" name="state">
            <option value="">Select State</option>
            <!-- Add state options dynamically based on selected country -->
        </select>
        <select id="city" name="city">
            <option value="">Select City</option>
            <!-- Add city options dynamically based on selected state -->
        </select>
        <select id="level" name="level">
            <option value="">Select Level</option>
            <!-- Add level options -->
        </select>
        <select id="type" name="type">
            <option value="">Select Type</option>
            <!-- Add type options -->
        </select>
        <input type="text" id="bin" name="bin" placeholder="BIN">
        <input type="text" id="zipcode" name="zipcode" placeholder="Zipcode">
        <button type="button" onclick="performSearch()">Search</button>
    </form>
    <div id="results"></div>
    <script>
        function performSearch() {
            const formData = new FormData(document.getElementById('searchForm'));
            const params = new URLSearchParams(formData).toString();
            fetch(`/search?${params}`)
                .then(response => response.json())
                .then(data => {
                    const resultsDiv = document.getElementById('results');
                    resultsDiv.innerHTML = '';
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.innerHTML = `BIN: ${item.bin}, Level: ${item.level}, Type: ${item.type}, Country: ${item.country}, State: ${item.state}, City: ${item.city}, Zipcode: ${item.zipcode}, Price: ${item.price}`;
                        resultsDiv.appendChild(div);
                    });
                });
        }
    </script>
</body>
</html>
