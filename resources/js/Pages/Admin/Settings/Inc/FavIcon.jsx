import React, { useState } from 'react';
import { useForm } from '@inertiajs/react'
import Panel from '@/Components/Panel';
import Input from '@/Components/Input';

const FavIcon = (fav) =>{
    const { data, setData, post, errors, clearErrors, progress, processing } = useForm({
        name: null,
        avatar: null,
      })
      
      function addLogo(e) {
        e.preventDefault()
        post('/upload-fav-icon')
      }

      const onHandleChange = (e) =>{
        setData('fav', e.target.files[0]);
        clearErrors(e.target.name);
      }

    return (
        <Panel title="Fav Icon" md="fw" className="">
            <form className='p-4' onSubmit={addLogo}>
                {progress && (
                    <progress value={progress.percentage} max="100">
                        {progress.percentage}%
                    </progress>
                )}
                {
                    fav.fav && (
                        <div className="row fav-panel mb-3">
                            <img src={fav.fav} alt="" />
                        </div>
                    )
                }
                <div className="form-row row">
                    <div className="col-md-9">
                        <Input type="file" name='fav' className={errors.fav && 'inerror'} handleChange={onHandleChange} />
                        {errors.logo &&  <div className="smart-valid">{errors.fav}</div> }
                    </div>
                    <div className="col-md-3">
                        <button disabled={processing} className="btn w-100 btn-sm btn-primary">Update Logo</button>
                    </div>
                </div>
            </form>         
        </Panel>
    )
}
export default FavIcon