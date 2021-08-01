import React, { useContext } from "react";
import { DataContext } from "../services/DataService";
import { Input, Form } from "antd";

const { Item } = Form;

export const Name = () => {
    const { name, setName } = useContext(DataContext);

    return (
        <Item
            name="name"
            label="Name of Applicant"
            rules={[
                {
                    required: true,
                },
            ]}
        >
            <Input
                value={name}
                onChange={setName}
                type="text"
                placeholder="Eg: Harry James Potter"
            />
        </Item>
    );
};
