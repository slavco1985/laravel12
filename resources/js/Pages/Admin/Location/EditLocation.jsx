import React, { useEffect } from 'react';
import EditModel from '@/Components/EditModel';
import { useForm } from '@inertiajs/react';
import Input from '@/Components/Input';
import Swal from 'sweetalert2';

const EditLocation = (props) =>{
    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        name: props.edit.name || '',
        image : '',
        _method: 'PUT'
    })

    useEffect(()=>{
        setData('name', props.edit.name );
    },[props])

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const updateLocation = (e) =>{
        e.preventDefault();
        post(route('location.update', props.edit),{
            onSuccess:()=>{
                props.mymodel.hide();
                Swal.fire('Updated Successfully!','','success');
            },
            preserveState: (page) => Object.keys(page.props.errors).length,
        })
    }

    const fileHandler = (event) =>{
        setData(event.target.name, event.target.files[0]);
    }
   
    return (
        <EditModel title="Edit Location" id="editlocation">
            <form className='p-4' onSubmit={updateLocation}>
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
                        <Input type="file"  className={errors.image && 'inerror'} name="image" 
                            placeholder="Enter City Name" handleChange={fileHandler}/>
                        {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                    </div>
                </div>
                <div className="form-group mb-1 row">
                    <div className="col-sm-4">
                        
                    </div>
                    <div className="col-sm-8 sticky">
                        <button type='submit' disabled={processing} className="btn btn-sm btn-primary">Update City</button>
                        
                    </div>
                </div>
            </form>
        </EditModel>
    )
}
export default EditLocation