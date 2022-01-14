<div id="loadMore" class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title flex-column-fluid">
            <div class = "d-flex justify-content-between flex-column-fluid" style="display: flex; justify-content: space-between;" >
                <div id = "switchContainer">
                    <input data-switch="true" id = "switch" type="checkbox" checked="checked" data-on-text="<i class='fas fa-image'></i>" data-handle-width="25" data-off-text="<i class='fas fa-music'></i>" data-on-color="primary" data-off-color="danger"  />
                </div>
                <input type = "text" class="form-control" placeholder = "Search ..." id="searchMedia"  style="width: 400px;" />
            </div>
        </div>
    </div>
    <div id = "manageContent">
        <div id = "mediaContent" style="padding: 30px; display: flex; flex-wrap: wrap; justify-content: start;"></div>
    </div>
    <div class="auto-load text-center" style="display:none;">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
    </div>
</div>