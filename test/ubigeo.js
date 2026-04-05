
import {
  getDepartment,
    getDistrict,
    getProvince,
    getUbigeoData,
  validateUbigeo,
  parseUbigeo,
  formatUbigeo
} from "../node_modules/ubigeo-fns/dist/index.js";
const ubigeo = '110206';
const department = getDepartment(ubigeo);
const provincia = getProvince(ubigeo);
const district = getDistrict(ubigeo);

validateUbigeo(ubigeo);

// formato 
formatUbigeo(ubigeo);

// parseo
parseUbigeo(ubigeo);

console.log('Departamento:', department);
console.log('Provincia :', provincia);
console.log('Distrito :', district);

const data = getUbigeoData(ubigeo);
console.log('Data :',data)