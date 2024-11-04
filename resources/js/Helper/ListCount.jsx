import React, {  useEffect, useState } from 'react';

const ListCount = ({name, value, max, onHandleChange}) =>{

    const [val, setvalue] = useState();

    useEffect(()=>{
        setvalue(value) 
    },[value])

    const Options = () =>{
        var arr = [];
        for (let i = 1; i <= max; i++) {
            arr.push(<option key={i} value={i}>{i}</option>)
        }
        return arr; 
    }
    return (
        <select name={name} value={val} onChange={onHandleChange} className='form-control'>
           <Options />
        </select>
    )
}
export default ListCount;