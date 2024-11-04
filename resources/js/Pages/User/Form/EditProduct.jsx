import React, { useEffect } from 'react';
import Input from '@/Components/Input';
import { useForm } from '@inertiajs/react';
import EditModel from '@/Components/EditModel';


const EditProduct = (props) =>{

    const { data, setData, post, processing, errors, reset, clearErrors } = useForm({
        name: props.edit.name || '',
        image: '',
        price: props.edit.price || '',
        _method: 'PUT'
    });

    useEffect(() => {
        setData({'price' : props.edit.price,'name' : props.edit.name,  _method: 'PUT'});
       
    }, [props]);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    };

    const handleFile = (event) =>{
        setData(event.target.name, event.target.files[0]);
    }

    const updateProduct = (e) =>{
        e.preventDefault();
        post(route('product.update', props.edit.id),{
            onSuccess: () =>{
                props.mymodel.hide();
                reset();
                Swal.fire('Saved Successfully!','','success');
            },
            preserveState: (page) => Object.keys(page.props.errors).length,
        });
    }

    return (
        <EditModel title="Edit Product" id="editlocation">
            <form className='p-4' onSubmit={updateProduct}>
                <div className="form-group  row">
                    <div className="col-sm-4">
                        <label htmlFor="">Product Name</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-sm-8 sticky">
                        <Input type='text' value={data.name} className={errors.name && 'inerror'} name="name" handleChange={onHandleChange} placeholder="Enter Product Name" />
                        {errors.name &&  <div className="smart-valid">{errors.name}</div> }
                    </div>
                </div>
                <div className="form-group  row">
                    <div className="col-sm-4">
                        <label htmlFor="">Image</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-sm-8 sticky">
                        <Input type='file' className={errors.image && 'inerror'} name="image" handleChange={handleFile} placeholder="Enter Product Image" />
                        {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                    </div>
                </div>
                <div className="form-group  row">
                    <div className="col-sm-4">
                        <label htmlFor="">Price</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-sm-8 sticky">
                        <Input type='text' value={data.price} className={errors.price && 'inerror'} name="price" handleChange={onHandleChange} placeholder="Enter Price" />
                        {errors.price &&  <div className="smart-valid">{errors.price}</div> }
                    </div>
                </div>
                <div className="form-group mb-1 row">
                    <div className="col-sm-4">
                        
                    </div>
                    <div className="col-sm-8 sticky">
                        <button type='submit' disabled={processing} className="btn  btn-primary">Update Product</button>
                        
                    </div>
                </div>
            </form>
        </EditModel>
    )
}
export default EditProduct