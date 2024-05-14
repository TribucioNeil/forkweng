<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-dark text-center text-sm-left d-block d-sm-inline-block" style="margin: 2px;">City Public
            Employment Service Office Calapan</span>
    </div>

</footer>

<!-- EMPLOYER TAB -->
<script>
window.addEventListener('load', function() {
    var div1 = document.getElementById('div1');
    var div2 = document.getElementById('div2');
    var div3 = document.getElementById('div3');

    var button1 = document.getElementById('toggle1');
    var button2 = document.getElementById('toggle2');
    var button3 = document.getElementById('toggle3');

    button1.addEventListener('click', function() {
        // toggle visibility of the two div elements
        div1.style.display = 'block';
        div2.style.display = 'none';
        div3.style.display = 'none';


    });

    button2.addEventListener('click', function() {
        // toggle visibility of the two div elements
        div3.style.display = 'none';
        div2.style.display = 'block';
        div1.style.display = 'none';


    });

    button3.addEventListener('click', function() {
        // toggle visibility of the two div elements
        div3.style.display = 'block';
        div1.style.display = 'none';
        div2.style.display = 'none';


    });
});
</script>

<!-- FAQS TAB -->
<script>
window.addEventListener('load', function() {
    var divs = document.getElementById('divs');
    var dive = document.getElementById('dive');

    var buttons = document.getElementById('toggles');
    var buttone = document.getElementById('togglee');

    buttons.addEventListener('click', function() {
        // toggle visibility of the two div elements
        divs.style.display = 'block';
        dive.style.display = 'none';


    });

    buttone.addEventListener('click', function() {
        // toggle visibility of the two div elements
        dive.style.display = 'block';
        divs.style.display = 'none';


    });

});
</script>

<!-- REVIEW TAB -->
<script>
window.addEventListener('load', function() {
    var divrs = document.getElementById('divrs');
    var divre = document.getElementById('divre');

    var buttonrs = document.getElementById('togglers');
    var buttonre = document.getElementById('togglere');

    buttonrs.addEventListener('click', function() {
        divrs.style.display = 'block';
        divre.style.display = 'none';


    });

    buttonre.addEventListener('click', function() {
        divre.style.display = 'block';
        divrs.style.display = 'none';


    });

});
</script>