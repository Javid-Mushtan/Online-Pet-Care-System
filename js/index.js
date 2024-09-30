document.getElementById('btn-g').onclick = function() {
        alert('Redirecting to booking page...');
};
document.getElementById('sbtn').onclick = function() {
        var searchText = document.querySelector('.search').value;
        if (searchText.trim() !== "") {
            alert('You searched for: ' + searchText);
        } 
        else {
            alert('Please enter a search term.');
        }
};
document.getElementById('signin').onclick = function() {
        alert('Redirecting to Sign-Up page...');
};

document.getElementById('signup').onclick = function() {
        alert('Redirecting to Sign-In page...');
};