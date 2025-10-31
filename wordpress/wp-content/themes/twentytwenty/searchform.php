<?php
/**
 * Custom Search Form Template
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 */

$unique_id = esc_attr( uniqid( 'search-form-' ) );
?>

<form role="search" method="get" class="custom-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-box">
        <div class="input-wrapper">
            <span class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#777" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 
                    1.415-1.414l-3.85-3.85zm-5.242.656a5 5 0 1 1 
                    0-10 5 5 0 0 1 0 10z"/>
                </svg>
            </span>
            <input
                type="search"
                id="<?php echo $unique_id; ?>"
                class="search-input"
                placeholder="Search topics or keywords"
                value="<?php echo get_search_query(); ?>"
                name="s"
            />
        </div>
        <button type="submit" class="search-button">Search</button>
    </div>
</form>

<style>
/* Căn giữa toàn form */
.custom-search-form {
    display: flex;
    justify-content: center;
    margin: 30px auto;
}

/* Khung chứa input + nút */
.search-box {
    display: flex;
    align-items: center;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    overflow: hidden;
}

/* Vùng input (gồm icon + input) */
.input-wrapper {
    display: flex;
    align-items: center;
    position: relative;
    flex-grow: 1;
    border: none;
    padding-left: 10px;
    width: 380px;
}

/* Icon kính lúp bên trong input */
.search-icon {
    position: absolute;
    left: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: none;
}

/* Ô nhập */
.search-input {
    width: 100%;
    border: none;
    padding: 10px 10px 10px 35px; /* chừa chỗ cho icon */
    font-size: 15px;
    outline: none;
}

/* Placeholder */
.search-input::placeholder {
    color: #aaa;
}

/* Nút search */
.search-button {
    background-color: #28a745;
    border: none;
    color: #fff;
    padding: 0 25px;
    height: 100%;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    white-space: nowrap;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 0 6px 6px 0;
    transition: background 0.3s ease;
}

.search-button:hover {
    background-color: #218838;
}
</style>
