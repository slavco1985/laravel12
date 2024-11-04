import React, { useEffect, useState } from 'react';
import Panel from "@/Components/Panel"
import { useForm } from '@inertiajs/react';
import Swal from 'sweetalert2';

const ImageUpload = ({err, success}) =>{

    
    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        category_id : '',
        image:  '',
        resize:  '',
    })   

    const fileHandler = (event) =>{
        setData(event.target.name, event.target.files);
        clearErrors(event.target.name);
    }
    


    const submitHandler = (e) =>{
        e.preventDefault();
        post(route('upload-bulk-images'),{
            onSuccess: () =>{
                reset();
                Swal.fire('Saved Successfully!','','success');
            },
            preserveState: (page) => Object.keys(page.props.errors).length,
        })
    }

    return (
        <Panel title="Bulk Business Image Upload" md="12">
            <div className="p-3 text-center pb-0">
                 <p>Original Image and cropped Image have same image name and the image name is mentioned in excel file. Size of cropped
                    image should be 420 x 280 px
                 </p>
            </div>
               
                <form className='p-4' onSubmit={submitHandler}>
                    
                    <div className="form-group pt-2 row">
                        <div className="col-sm-4">
                            <label htmlFor="">Original Images</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <input type="file" multiple  accept="image/*" name='image' className='form-control' onChange={fileHandler}/>
                            {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                        </div>
                    </div>
                    <div className="form-group pt-2 row">
                        <div className="col-sm-4">
                            <label htmlFor="">Cropped Images</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <input type="file" multiple  accept="image/*" name='resize' className='form-control' onChange={fileHandler}/>
                            {errors.resize &&  <div className="smart-valid">{errors.resize}</div> }
                        </div>
                    </div>
                    <div className="form-group  row">
                        <div className="col-sm-4">
                            
                        </div>
                        <div className="col-sm-8 sticky">
                            <button className="btn fs-9 fw-bold  btn-primary">Upload Image</button>
                        </div>
                    </div>
                </form>
            </Panel>
    )
}
export default ImageUpload