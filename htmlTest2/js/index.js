
$(document).ready(function() {



    var numItems = $('li.fancyTab').length;


			  if (numItems == 12){
					$("li.fancyTab").width('8.3%');
				}
			  if (numItems == 11){
					$("li.fancyTab").width('9%');
				}
			  if (numItems == 10){
					$("li.fancyTab").width('10%');
				}
			  if (numItems == 9){
					$("li.fancyTab").width('11.1%');
				}
			  if (numItems == 8){
					$("li.fancyTab").width('12.5%');
				}
			  if (numItems == 7){
					$("li.fancyTab").width('14.2%');
				}
			  if (numItems == 6){
					$("li.fancyTab").width('16.666666666666667%');
				}
			  if (numItems == 5){
					$("li.fancyTab").width('20%');
				}
			  if (numItems == 4){
					$("li.fancyTab").width('25%');
				}
			  if (numItems == 3){
					$("li.fancyTab").width('33.3%');
				}
			  if (numItems == 2){
					$("li.fancyTab").width('50%');
				}




		});


google.charts.load('current', {packages: ['corechart']});
// 로딩 완료시 함수 실행하여 차트 생성
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

	// 차트 데이터 설정
	var data = google.visualization.arrayToDataTable([
		['요일', '운행시간'], // 항목 정의
    ['SUN', 1],
		['MON', 2],
    ['TUE', 3],
    ['WED', 4],
    ['THU', 5],
    ['FRI', 4],
    ['SAT', 1],

	]);

	// 그래프 옵션
	var options = {
		width : 1100, // 가로 px
		height : 200, // 세로 px
		bar : {
			groupWidth : '50%' // 그래프 너비 설정 %
		},
		legend : {
			position : 'none' // 항목 표시 여부 (현재 설정은 안함)
		}
	};

	var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	chart.draw(data, options);
}

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
  // 차트 데이터 설정
	var data = google.visualization.arrayToDataTable([
		['요일', '업무용', '비업무용', '출퇴근용'], // 항목 정의
    ['SUN', 1, 2, 3],
		['MON', 1, 2, 3],
    ['TUE', 3, 2, 3],
    ['WED', 4, 2, 3],
    ['THU', 5, 2, 3],
    ['FRI', 4, 2, 3],
    ['SAT', 1, 2, 3],

	]);

  // 그래프 옵션
  var options = {
    width : 1100, // 가로 px
    height : 200, // 세로 px
    bar : {
      groupWidth : '50%' // 그래프 너비 설정 %
    },
    isStacked : true // 그래프 쌓기(스택), 기본값은 false
  };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_stack'));
      chart.draw(data, options);
}





function drawGIS(){
  var mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
        center: new daum.maps.LatLng(37.54699, 127.09598), // 지도의 중심좌표
        level: 4 // 지도의 확대 레벨
    };

var map = new daum.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

var imageSrc = 'http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/marker_red.png', // 마커이미지의 주소입니다
    imageSize = new daum.maps.Size(64, 69), // 마커이미지의 크기입니다
    imageOption = {offset: new daum.maps.Point(27, 69)}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

// 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
var markerImage = new daum.maps.MarkerImage(imageSrc, imageSize, imageOption),
    markerPosition = new daum.maps.LatLng(37.54699, 127.09598); // 마커가 표시될 위치입니다

// 마커를 생성합니다
var marker = new daum.maps.Marker({
    position: markerPosition,
    image: markerImage // 마커이미지 설정
});

// 마커가 지도 위에 표시되도록 설정합니다
marker.setMap(map);

}

function initMap() {
  var uluru = {lat: 35.8900521, lng: 128.6113282};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: uluru
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
}
