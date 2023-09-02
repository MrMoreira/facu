/*Fica ouvindo para ver se tem algum envento no HTML*/
document.addEventListener("DOMContentLoaded", function () { 
const tipA = document.querySelector('#tipA')
const Mamifero = document.querySelector('#Mamifero')
const Aves = document.querySelector('#Aves')
const Repteis = document.querySelector('#Repteis')
const CAnimal = document.querySelector('#CAnimal')
const CAnimal2 = document.querySelector('#CAnimal2')
const CAnimal3 = document.querySelector('#CAnimal3')
const carniv = document.querySelector('#carniv')
const herb = document.querySelector('#herb')
const quadrupedes = document.querySelector('#quadrupedes')
const voadores = document.querySelector('#voadores')
const aquaticos = document.querySelector('#aquaticos')
const bipedes = document.querySelector('#bipedes')
const TypeAnimal = document.querySelector('#TypeAnimal')

    function verifica1() {
        if (Mamifero.checked) {
            TypeAnimal.style.display = 'none';
            CAnimal3.style.display = 'none';
            CAnimal2.style.display = 'none';
            CAnimal.style.display = 'block';
        } else if (Aves.checked) {
            TypeAnimal.style.display = 'none';
            CAnimal.style.display = 'none';
            CAnimal3.style.display = 'none';
            CAnimal2.style.display = 'block';
        } else if (Repteis.checked) {
            TypeAnimal.style.display = 'none';
            CAnimal.style.display = 'none';
            CAnimal2.style.display = 'none';
            CAnimal3.style.display = 'block';
        } else {
            TypeAnimal.style.display = 'none';
            CAnimal.style.display = 'none';
            CAnimal2.style.display = 'none';
            CAnimal3.style.display = 'none';
            
        }
    }

    function verifica2() {
        if (quadrupedes.checked) {
            TypeAnimal.style.display = 'block';
            console.log('quadrupedes')
        }else if (voadores.checked) {
            TypeAnimal.style.display = 'none';
        }else if (aquaticos.checked) {
            TypeAnimal.style.display = 'none';
        }else if (bipedes.checked) {
            TypeAnimal.style.display = 'none';
        }
    }

    function verifica3() {
        if (carniv.checked) {
            console.log('carnivoro')
        }else if (herb.checked) {
            console.log('herbivoro')
        }
    }

    // Adicione um ouvinte de evento "change" a todas as checkboxes
    /*Function 1*/ 
    Mamifero.addEventListener("change", verifica1);
    Aves.addEventListener("change", verifica1);
    Repteis.addEventListener("change", verifica1);
    /*Function 2*/ 
    quadrupedes.addEventListener("change", verifica2);
    voadores.addEventListener("change", verifica2);
    aquaticos.addEventListener("change", verifica2);
    bipedes.addEventListener("change", verifica2);
    /*Function 3*/ 
    carniv.addEventListener("change", verifica3);
    herb.addEventListener("change", verifica3);
 });
