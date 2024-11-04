import React, { useEffect, useState } from 'react';
import Panel from "@/Components/Panel"
import Input from '@/Components/Input';
import { useForm } from '@inertiajs/react';
import Swal from 'sweetalert2';

const Products = ({err, success, business}) =>{

    const [importErrors, setImportErrors] = useState('');
    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        business_id : '',
        file:  '',
    })

    useEffect(() => {
        if(err[0]){
            Swal.fire('Import Failed !', err[0], 'error');
        }
    }, [err]);

   

    const fileHandler = (event) =>{
        setData('file', event.target.files[0]);
        clearErrors(event.target.name);
    }

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const submitHandler = (e) =>{
        e.preventDefault();
        post(route('upload-bulk-products'),{
            onSuccess: (page) =>{
                setImportErrors(page.props.errors);
                reset();
                Swal.fire('Saved Successfully!','','success');
            },
            preserveState: (page) => Object.keys(page.props.errors).length,
        })
    }

    return (
        <Panel title="Import Business Products" md="12">
                <div className="div p-3 pb-0">
                    {
                        (importErrors[0])  ? <div className="alert mb-0 alert-danger" role="alert">{importErrors[0]} </div> : ''
                    }
                    {
                        (success) ? <div className="alert mb-0 alert-success" role="alert">{success} </div> : ''
                    }
                </div>
                <form className='p-4' onSubmit={submitHandler}>
                    <div className="form-group pt-2 row">
                        <div className="col-sm-4">
                            <label htmlFor="">Select Business</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <select name="business_id" onChange={onHandleChange} className={`form-control ${errors.business_id && 'is-invalid'}`}>
                                <option value="">Select Business</option>
                                {
                                    business && business.map((b, i)=>{
                                        return <option key={i} value={b.id}>{b.business_name}</option>
                                    })
                                }
                            </select>
                            {errors.business_id &&  <div className="smart-valid">{errors.business_id}</div> }
                        </div>
                    </div>
                    <div className="form-group pt-2 row">
                        <div className="col-sm-4">
                            <label htmlFor="">Select Import File</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <Input type="file"  className={errors.file && 'is-invalid'} name="file" 
                            handleChange={fileHandler}/>
                            {errors.file &&  <div className="smart-valid">{errors.file}</div> }
                        </div>
                    </div>
                    <div className="form-group  row">
                        <div className="col-sm-4">
                            
                        </div>
                        <div className="col-sm-8 sticky">
                            <button className="btn fs-9 fw-bold  btn-primary">Upload Data</button>
                            <a target='_self' href='../storage/products.xlsx' className='float-end text-primary pt-2'>Download Sample</a>
                        </div>
                    </div>
                </form>
            </Panel>
    )
}
export default Products