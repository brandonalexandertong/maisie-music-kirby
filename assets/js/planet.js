// again, creating a renderer first

const renderer = new THREE.WebGLRenderer({
  // makes it crispy
  antialias: true
})

renderer.setSize(window.innerWidth, window.innerHeight)
renderer.setPixelRatio(window.devicePixelRatio)
renderer.setClearColor(0xF3E9FF, 1)


const sectionTag = document.querySelector("section")
sectionTag.appendChild(renderer.domElement)

const scene = new THREE.Scene()

// add ambient lighting
const ambientLight = new THREE.AmbientLight(0x777777)
scene.add(ambientLight)

// add point light
const pointLight = new THREE.PointLight(0xffffff, 1, 0, 2)
pointLight.position.set(-20, -20, -200)
scene.add(pointLight)


const camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 10000)
camera.position.z = -50

// need to make a texture loader to load custom textures
const loader = new THREE.TextureLoader()

// make planet wilson by creating a gemoetry (shape) then a material
// then adding them together in a mesh
THREE.Object3D.DefaultUp.set(0.0, 0.0, 1.0)



const makePlanet = function () {
  // load in custom texture
  // texture must be 2^x on each side ie x^a, x^b
  const x = 0, y = 0
  const heartShape = new THREE.Shape()
    heartShape.moveTo( x + 5, y + 5 )
    heartShape.bezierCurveTo( x + 5, y + 5, x + 4, y, x, y )
    heartShape.bezierCurveTo( x - 6, y, x - 6, y + 7,x - 6, y + 7 )
    heartShape.bezierCurveTo( x - 6, y + 11, x - 3, y + 15.4, x + 5, y + 19 )
    heartShape.bezierCurveTo( x + 12, y + 15.4, x + 16, y + 11, x + 16, y + 7 )
    heartShape.bezierCurveTo( x + 16, y + 7, x + 16, y, x + 10, y )
    heartShape.bezierCurveTo( x + 7, y, x + 5, y + 5, x + 5, y + 5 )

  const extrusionSettings = {
      steps: 12, size: 100, height: 100 , curveSegments: 1000,
      bevelThickness: 4, bevelSize: 7, bevelEnabled: true,
      material: 0, extrudeMaterial: 1, depth: 1
  }

  const texture = loader.load("")
  const geometry = new THREE.ExtrudeBufferGeometry(heartShape, extrusionSettings)
  geometry.center()

  const material = new THREE.MeshToonMaterial({
    color: 0xA27DFF
    // map: texture
  })

  const mesh = new THREE.Mesh(geometry, material)
    scene.add(mesh)
    // want to hold as earth
    return mesh
}



const heart = makePlanet()
heart.rotation.set(3, 0, 0)
heart.position.y = -1
const animate = function () {
  camera.lookAt(scene.position)
  renderer.render(scene, camera)
  heart.rotateY(0.001)
  requestAnimationFrame(animate)
}

animate()

window.addEventListener("resize", function () {
  camera.aspect = window.innerWidth / window.innerHeight
  camera.updateProjectionMatrix()

  renderer.setSize(window.innerWidth, window.innerHeight)
})


// going to have the earth rotate on scroll
// having a variable called scrollPosition which corresponds to how far
// up or down we have scrolled
document.addEventListener( "scroll", function () {
  const scrollPosition = window.pageYOffset
  // having the rotation set to the scroll position
  // because .rotation.set(x, y, z) is in radians, we are dividing by 100
  // to make one pixel equal to 1/100 radian movement
  heart.rotation.set(3, scrollPosition / 100, 0)
})


heartResize = () => {
  if (window.innerWidth < 450) {
    heart.position.z = 50
  } else {
    heart.position.z = 0
  }
}

heartResize()

const contactButton = document.querySelector(".contact-button")
const newsButton = document.querySelector(".news-button")
const tourButton = document.querySelector(".tour-button")
const musicButton = document.querySelector(".music-button")
const homeButton = document.querySelector(".home-button")
const merchButton = document.querySelector(".merch-button")


let state = false

const contactPopup = document.querySelector(".contact-pop")
const newsPopup = document.querySelector(".news")
const maisieLogo = document.querySelector(".maisie-logo")

const toggleContact = () => {

  state = !state
  if (state == true) {
    console.log('remove the heart')
    // scene.remove(heart)
    // camera.position.z = -5000
    gsap.to(heart.position, {duration:0.5, z:1000})
    contactPopup.classList.add('display')
    newsButton.classList.add('remove')
    homeButton.classList.add('remove')
    merchButton.classList.add('remove')
    // tourButton.classList.add('remove')
    musicButton.classList.add('remove')
    maisieLogo.classList.remove('display')
    contactButton.innerHTML = "Return"


  } else {
    console.log('add the heart')
    // scene.add(heart)
    // camera.position.z = -50
    if (window.innerWidth < 450) {
      gsap.to(heart.position, {duration: .5, z:50})
    } else {
      gsap.to(heart.position, {duration:0.5, z:0})
    }
    contactPopup.classList.remove('display')
    maisieLogo.classList.add('display')
    contactButton.innerHTML = "Contact"
    newsButton.classList.remove('remove')
    homeButton.classList.remove('remove')
    merchButton.classList.remove('remove')
    // tourButton.classList.remove('remove')
    musicButton.classList.remove('remove')
    // heartResize()
  }
}

const toggleNews = () => {
  state = !state
  if (state == true) {
    console.log('remove the heart')
    // scene.remove(heart)
    // camera.position.z = -5000
    gsap.to(heart.position, {duration:0.5, z:1000})
    newsPopup.classList.add('news-display')
    homeButton.classList.add('remove')
    // tourButton.classList.add('remove')
    musicButton.classList.add('remove')
    contactButton.classList.add('remove')
    merchButton.classList.add('remove')
    maisieLogo.classList.remove('display')
    newsButton.innerHTML = "Return"


  } else {
    console.log('add the heart')
    // scene.add(heart)
    // camera.position.z = -50
    if (window.innerWidth < 450) {
      gsap.to(heart.position, {duration: .5, z:50})
    } else {
      gsap.to(heart.position, {duration:0.5, z:0})
    }

    newsPopup.classList.remove('news-display')
    maisieLogo.classList.add('display')
    newsButton.innerHTML = "News"
    contactButton.classList.remove('remove')
    homeButton.classList.remove('remove')
    merchButton.classList.remove('remove')
    // tourButton.classList.remove('remove')
    musicButton.classList.remove('remove')
  }

}








contactButton.addEventListener('click', toggleContact)
window.addEventListener('resize', heartResize)
newsButton.addEventListener('click', toggleNews)
