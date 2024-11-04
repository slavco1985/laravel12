import React, { useEffect, useState } from 'react';
import { Link, useForm } from '@inertiajs/react';
import Swal from 'sweetalert2'
import Input from '@/Components/Input';

const LocationForm = (props) =>{
    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        name: '',
        image:'',
    })

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const saveLocation = (e) =>{
        e.preventDefault();
        post(route('location.store'),
        {
            onSuccess: () => {
                reset();
                Swal.fire('Saved Successfully!','','success');
            },
            preserveState: (page) => Object.keys(page.props.errors).length,
            
        })
    }

    const fileHandler = (event) =>{
        setData(event.target.name, event.target.files[0]);
    }

    return (
        <form className='p-4' onSubmit={saveLocation}>
            <div className="form-group  row">
                <div className="col-sm-4">
                    <label htmlFor="">City Name</label>
                    <span className="form-indicat">:</span>
                </div>
                <div className="col-sm-8 sticky">
                    <Input type="text"  className={errors.name && 'inerror'} name="name" value={data.name}
                        placeholder="Enter City Name" handleChange={onHandleChange}/>
                    {errors.name &&  <div className="smart-valid">{errors.name}</div> }
                </div>
            </div>
            <div className="form-group  row">
                <div className="col-sm-4">
                    <label htmlFor="">Image</label>
                    <span className="form-indicat">:</span>
                </div>
                <div className="col-sm-8 sticky">
                    <Input type="file"  className={errors.image && 'inerror'} name="image" handleChange={fileHandler}/>
                    {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                </div>
            </div>
            <div className="form-group mb-1 row">
                <div className="col-sm-4">
                    
                </div>
                <div className="col-sm-8 sticky">
                    <button disabled={processing} className="btn btn-sm btn-primary">Add City</button>
                </div>
            </div>
        </form>
    )
}
export default LocationForm