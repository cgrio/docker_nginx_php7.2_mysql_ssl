import { AddUserParams, UserModel } from "@/domain/models/user";
import { ADD_USER_SERVICE, IAddUserService } from "@/domain/use-cases/add-user-service";
import { Adapter, Body, Mapping, Post } from "@tsclean/core";

@Mapping('api/v1/add-user')
export class AddUserController {

    constructor(
        @Adapter(ADD_USER_SERVICE) private readonly addUserService: IAddUserService
    ) {
    }

    @Post()
    async addUserController(@Body() data: AddUserParams): Promise<UserModel> {
        return await this.addUserService.addUserService(data);
    }
}