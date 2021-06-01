/*
https://yukimonkey.com/animation/three-no2/を参考に作成。
Copyright © yukimonkey
*/

var init = function () {
  var width = 900;
  height = 750;

  //レンダラーを作成
  var renderer = new THREE.WebGLRenderer({
    canvas: document.querySelector("#canvas"),
    antialisa: true,
  });
  renderer.setSize(width, height);

  //シーンを作成
  var scene = new THREE.Scene();

  //カメラを作成
  var camera = new THREE.PerspectiveCamera(45, width / height, 1, 1000);

  const geometry = new THREE.Geometry();

  for (let i = 0; i < 10000; i++) {
    let vertex = new THREE.Vector3();
    vertex.x = Math.random() * 2000 - 1000;
    vertex.y = Math.random() * 2000 - 1000;
    vertex.z = Math.random() * 2000 - 1000;
    geometry.vertices.push(vertex);
  }
  function particle(size) {
    const material = new THREE.PointsMaterial({ size: size });
    const particles = new THREE.Points(geometry, material);
    particles.rotation.x = Math.random() * 10;
    particles.rotation.y = Math.random() * 10;
    particles.rotation.z = Math.random() * 10;
    scene.add(particles);
  }

  for (let k = 0; k < 13; k++) particle(k);

  //†漆黒の霧†
  var randome = Math.random() * 19;
  if (randome <= 3) {
    scene.fog = new THREE.Fog(0x005555, 1, 10);
  } else if (randome <= 6) {
    scene.fog = new THREE.Fog(0x550055, 1, 10);
  } else if (randome <= 9) {
    scene.fog = new THREE.Fog(0x555500, 1, 10);
  } else if (randome <= 12) {
    scene.fog = new THREE.Fog(0x000077, 1, 10);
  } else if (randome <= 15) {
    scene.fog = new THREE.Fog(0x770000, 1, 10);
  } else {
    scene.fog = new THREE.Fog(0x005500, 1, 10);
  }

  renderer.render(scene, camera);

};
window.addEventListener("DOMContentLoaded", init);
