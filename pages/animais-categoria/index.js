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
    const onivoros = document.querySelector('#onivoros')
    const frutivoros = document.querySelector('#frutivoros')
    const TypeAnimal1 = document.querySelector('#TypeAnimal1')
    const nvoadores = document.querySelector('#nvoadores')
    const Nadadoras = document.querySelector('#Nadadoras')
    const Rapina = document.querySelector('#Rapina')
    const TypeAnimal2 = document.querySelector('#TypeAnimal2')
    const result = document.querySelector('#result')
    const Tropi = document.querySelector('#Tropi')
    const Polar = document.querySelector('#Polar')
    const cCasco = document.querySelector('#cCasco')
    const carnivoros = document.querySelector('#carnivoros')
    const spatas = document.querySelector('#spatas')

    function verifica1() {
        if (Mamifero.checked) {
            TypeAnimal2.style.display = 'none';
            TypeAnimal1.style.display = 'none';
            TypeAnimal.style.display = 'none';
            CAnimal3.style.display = 'none';
            CAnimal2.style.display = 'none';
            CAnimal.style.display = 'block';
            result.style.display = 'none';
        } else if (Aves.checked) {
            TypeAnimal2.style.display = 'none';
            TypeAnimal1.style.display = 'none';
            TypeAnimal.style.display = 'none';
            CAnimal.style.display = 'none';
            CAnimal3.style.display = 'none';
            CAnimal2.style.display = 'block';
            result.style.display = 'none';
        } else if (Repteis.checked) {
            TypeAnimal2.style.display = 'none';
            TypeAnimal1.style.display = 'none';
            TypeAnimal.style.display = 'none';
            CAnimal.style.display = 'none';
            CAnimal2.style.display = 'none';
            CAnimal3.style.display = 'block';
            result.style.display = 'none';
        } else {
            TypeAnimal2.style.display = 'none';
            TypeAnimal.style.display = 'none';
            TypeAnimal.style.display = 'none';
            CAnimal.style.display = 'none';
            CAnimal2.style.display = 'none';
            CAnimal3.style.display = 'none';
            result.style.display = 'none';

        }
    }

    function verifica2() {
        if (quadrupedes.checked) {
            TypeAnimal1.style.display = 'none';
            TypeAnimal.style.display = 'block';
            result.style.display = 'none';
            
        } else if (voadores.checked) {
            TypeAnimal1.style.display = 'none';
            TypeAnimal.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Morcego';
        } else if (aquaticos.checked) {
            TypeAnimal1.style.display = 'none';
            TypeAnimal.style.display = 'none';
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Baleia';
        } else if (bipedes.checked) {
            TypeAnimal.style.display = 'none';
            TypeAnimal1.style.display = 'block';
            result.style.display = 'none';
        }
    }

    function verifica3() {
        if (carniv.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Leão';
        } else if (herb.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Cavalo';
        }
    }

    function verifica4() {
        if (onivoros.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Homem';
        } else if (frutivoros.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Macaco';
        }
    }

    function verifica5() {
        if (nvoadores.checked) {
            TypeAnimal2.style.display = 'block';
            result.style.display = 'none';
            console.log('nvoadores')
        } else if (Nadadoras.checked) {
            TypeAnimal2.style.display = 'none';
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Pato';
        } else if (Rapina.checked) {
            TypeAnimal2.style.display = 'none';
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Águia';
        }
    }

    function verifica6() {
        if (Tropi.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Avestruz';
        } else if (Polar.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Pinguim';
        }
    }

    function verifica7() {
        if (carnivoros.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Tartaruga';
        } else if (cCasco.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Crocodilo';
        } else if (spatas.checked) {
            result.style.display = 'none';
            result.style.display = 'block';
            result.innerHTML = 'Cobra';
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
    /*Function 4*/
    onivoros.addEventListener("change", verifica4);
    frutivoros.addEventListener("change", verifica4);
    /*Function 5*/
    nvoadores.addEventListener("change", verifica5);
    Nadadoras.addEventListener("change", verifica5);
    Rapina.addEventListener("change", verifica5);
    /*Function 6*/
    Tropi.addEventListener("change", verifica6);
    Polar.addEventListener("change", verifica6);
    /*Function 7*/
    carnivoros.addEventListener("change", verifica7);
    cCasco.addEventListener("change", verifica7);
    spatas.addEventListener("change", verifica7);
});
